<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['pro_id']) && isset($_POST['customer_id']))
	{
		if(!empty($_POST['pro_id']) && !empty($_POST['customer_id']))
		{
			$whishlist_pro_id = $_POST['pro_id'];
			$whishlist_customer_id = $_POST['customer_id'];
			
			$q_dp="delete from wishlist where whishlist_pro_id = '".$whishlist_pro_id."' and whishlist_customer_id = '".$whishlist_customer_id."'";
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