<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['customer_id']))
	{
		if(!empty($_POST['customer_id']))
		{
			$customer_id = $_POST['customer_id'];
		
			$query = "select customer_id,customer_name,customer_last_name,customer_email,customer_contact,customer_billing_address,customer_city,customer_state,customer_country,customer_zip from customers where customer_id = '".$customer_id."'";
        	$stm = $conn->prepare($query);
        												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($customer_id,$customer_name,$customer_last_name,$customer_email,$customer_contact,$customer_billing_address,$customer_city,$customer_state,$customer_country,$customer_zip);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $stm->fetch();
        			$details = array('status'=>"1",'message'=>"Success",'id'=>"$customer_id",'firstname'=>"$customer_name",'lastname'=>"$customer_last_name",'email'=>"$customer_email",'contact'=>"$customer_contact",'address'=>"$customer_billing_address",'city'=>"$customer_city",'state'=>"$customer_state",'country'=>"$customer_country",'zipcode'=>"$customer_zip");
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