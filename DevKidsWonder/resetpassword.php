<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$customer_email = $_POST['email'];
			$customer_password = md5($_POST['password']);
			
			$q_dp="update customers set customer_password = '".$customer_password."' where customer_email = '".$customer_email."'";
			
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