<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['customer_id']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['zipcode']))
	{
		if(!empty($_POST['customer_id']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['country']) && !empty($_POST['zipcode']))
		{
			$customer_id = $_POST['customer_id'];
			$customer_name = $_POST['firstname'];
			$customer_last_name = $_POST['lastname'];
			$customer_email = $_POST['email'];
			$customer_contact = $_POST['contact'];
			$customer_billing_address = $_POST['address'];
			$customer_city = $_POST['city'];
			$customer_state = $_POST['state'];
			$customer_country = $_POST['country'];
			$customer_zip = $_POST['zipcode'];
			
			$q_dp="update customers set customer_name = '".$customer_name."',customer_last_name = '".$customer_last_name."',customer_email = '".$customer_email."',customer_contact = '".$customer_contact."',customer_billing_address = '".$customer_billing_address."',customer_city = '".$customer_city."',customer_state='".$customer_state."',customer_country='".$customer_country."',customer_zip = '".$customer_zip."' where customer_id = '".$customer_id."'";
			
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