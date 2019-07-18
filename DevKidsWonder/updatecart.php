<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['pro_id']) && isset($_POST['customer_id']) && isset($_POST['cart_pro_quantity']))
	{
		if(!empty($_POST['pro_id']) && !empty($_POST['customer_id']) && !empty($_POST['cart_pro_quantity']))
		{
			$cart_pro_id = $_POST['pro_id'];
			$cart_customer_id = $_POST['customer_id'];
			$cart_pro_quantity = $_POST['cart_pro_quantity'];
			
			$q_dp="update cart set cart_pro_quantity = '".$cart_pro_quantity."' where cart_pro_id = '".$cart_pro_id."' and cart_customer_id = '".$cart_customer_id."'";
			
			$stdp=$conn->prepare($q_dp);
			$stdp->execute();
			$details = array('status'=>"1",'message'=>"success");
		}
		else
			$details = array('status'=>"0",'message'=>"Parameter is Empty");
	}
	else
		$details = array('status'=>"0",'message'=>"parameter missing");
	
	echo json_encode($details);
	
	$conn->close();
?>