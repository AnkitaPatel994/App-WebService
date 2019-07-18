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
		
			$query = "select customer_id,customer_name,customer_last_name,customer_email,customer_contact from customers WHERE customer_email='$customer_email' and customer_password='$customer_password' and status='active'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($customer_id,$customer_name,$customer_last_name,$customer_email,$customer_contact);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				$stm->fetch();
				/*while($stm->fetch())
				{
					$customer[]=array('id'=>"$customer_id",'firstname'=>"$customer_name",'lastname'=>"$customer_last_name",'email'=>"$customer_email",'mobile'=>"$customer_contact");
				}*/
				
				$details = array('status'=>"1",'message'=>"Your Login has been Successfully... Please Continue Shopping",'id'=>"$customer_id",'firstname'=>"$customer_name",'lastname'=>"$customer_last_name",'email'=>"$customer_email",'mobile'=>"$customer_contact");
			
				}else{
					$details = array('status'=>"0",'message'=>"Username and password Wrong");
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