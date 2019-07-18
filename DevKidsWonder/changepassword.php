<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['user_id']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['old_password']) && isset($_POST['new_password']))
	{
		if(!empty($_POST['user_id']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['old_password']) && !empty($_POST['new_password']))
		{
			$customer_id = $_POST['user_id'];
			$customer_email = $_POST['email'];
			$customer_contact = $_POST['contact'];
			$old_password = md5($_POST['old_password']);
			$new_password = md5($_POST['new_password']);
		
			$query = "select customer_password from customers WHERE customer_id='$customer_id' and customer_email='$customer_email' and customer_contact='$customer_contact' and customer_password='$old_password'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($customer_password);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0)
				{			
					$stm->fetch();
					$q_dp="update customers set customer_password = '".$new_password."' where customer_id = '".$customer_id."'";
			
        			$stdp=$conn->prepare($q_dp);
        			$stdp->execute();
					$details = array('status'=>"1",'message'=>"Your Password Change Successfully");
				}
				else
				{
					$details = array('status'=>"0",'message'=>"Your Old Password Wrong");
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
