<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['customer_id']) && isset($_POST['pro_id']) && isset($_POST['pro_quantity']) && isset($_POST['pro_price']))
	{
		if(!empty($_POST['customer_id']) && !empty($_POST['pro_id']) && !empty($_POST['pro_quantity']) && !empty($_POST['pro_price']))
		{
			$cart_customer_id = $_POST['customer_id'];
			$cart_pro_id = $_POST['pro_id'];
			$cart_pro_quantity = $_POST['pro_quantity'];
			$cart_pro_price = $_POST['pro_price'];
			$cart_size_id = $_POST['cart_size_name'];
			
			$query = "select cart_customer_id,cart_pro_id,cart_pro_quantity,cart_pro_price,cart_size_id from cart where cart_pro_id = '".$cart_pro_id."' and cart_customer_id = '".$cart_customer_id."' and cart_size_id = '".$cart_size_id."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($cart_customer_id,$cart_pro_id,$cart_pro_quantity,$cart_pro_price,$cart_size_id);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"1",'message'=>"alredy insert");
        		}
        		else
        		{
        		    $q_dp="insert into cart(cart_customer_id,cart_pro_id,cart_pro_quantity,cart_pro_price,cart_size_id) values(?,?,?,?,?)";
        			$stdp=$conn->prepare($q_dp);
        			
        			if($stdp)
        			{
        				$stdp->bind_param('sssss',$cart_customer_id,$cart_pro_id,$cart_pro_quantity,$cart_pro_price,$cart_size_id);
        				$stdp->execute();
        				$i_id=$stdp->insert_id;
        				$details = array('status'=>"1",'message'=>"success", 'id'=>$i_id);
        			}
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