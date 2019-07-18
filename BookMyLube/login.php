<?php
	include "../conn.php";

	$details;
	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
		
			$query = "select id,email from admin_login WHERE email='$email' and password='$password'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($id,$email);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				$stm->fetch();
				
				$details = array('status'=>"1",'message'=>"Your Login has been Successfully...",'id'=>"$id",'email'=>"$email");
			
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