<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['invoice_no']))
	{
		if(!empty($_POST['invoice_no']))
		{
			$invoice_no = $_POST['invoice_no'];
			
			$q_dp="update customer_orders set order_status = 'Cancel' where invoice_no = '".$invoice_no."'";
			$stdp=$conn->prepare($q_dp);
			$stdp->execute();
			$details = array('status'=>"1",'message'=>"success");
		   
		  
    $find="select * from customer_orders where invoice_no='$invoice_no'";
    $row=mysqli_query($conn,$find);
   
   
    while($rows=mysqli_fetch_array($row)){
        $qty=$rows['order_qty'];
        $pid=$rows['order_pro_id'];
        
        $sql01="select * from products where pro_id='$pid'";
        $res01=mysqli_query($conn,$sql01);
        $pro_rows=mysqli_fetch_array($res01);
        
        $sql001="select * from size where s_pro_id='$pid' and s_id='".$rows['order_size']."'";
        $res001=mysqli_query($conn,$sql001);
        $size_rows=mysqli_fetch_array($res001);
        if($rows['order_size']!=''){
            $q=0;
            $q=$pro_rows['pro_quantity']+$qty;
             $sql02="update products set pro_quantity='$q' where pro_id='$pid'";
            $res02=mysqli_query($conn,$sql02);
            
            $sq=$size_rows['size_qty']+$qty;
           $sql03="update size set size_qty='$sq' where s_pro_id='$pid' and s_id='".$rows['order_size']."'";
            $res03=mysqli_query($conn,$sql03);
        }else{
            $q=0;
             $q=$pro_rows['pro_quantity']+$qty;
             $sql02="update products set pro_quty=$q where pro_id='$pid'";
            $res02=mysqli_query($conn,$sql02);
        }
    }
		}
		else
			$details = array('status'=>"0",'message'=>"Parameter is Empty");
	}
	else
		$details = array('status'=>"0",'message'=>"parameter missing");
	
	echo json_encode($details);
	
	$conn->close();
?>