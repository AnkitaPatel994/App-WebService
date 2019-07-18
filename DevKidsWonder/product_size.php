<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['pro_id']))
	{
		if(!empty($_POST['pro_id']))
		{
			$s_pro_id=$_POST['pro_id'];
			
			$query = "select s_id,s_pro_id,size,size_qty,size_price,size_discount,size_chart_img from size where s_pro_id = '".$s_pro_id."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($s_id,$s_pro_id,$size,$size_qty,$size_price,$size_discount,$size_chart_img);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    while($stm->fetch())
        			{
        		        $ProductSize[]=array('s_id'=>"$s_id",'s_pro_id'=>"$s_pro_id",'size_name'=>"$size",'size_qty'=>"$size_qty",'size_price'=>"$size_price",'size_discount'=>"$size_discount",'size_chart_img'=>"$size_chart_img");
        			}
        			$details = array('status'=>"1",'message'=>"Success",'ProductSize'=>$ProductSize);
        		}
        		else
        		{
        		    $details = array('status'=>"0",'message'=>"No Category Found");
        		}
			}
			else 
        	{
        		$details = array('status'=>"0",'message'=>"connection error exist");
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