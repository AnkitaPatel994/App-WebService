<?php

	include "config.php";

	$details;
	
	if(isset($_POST['pincode_no']))
	{
		if(!empty($_POST['pincode_no']))
		{
			$pincode_no = $_POST['pincode_no'];
		
			$query = "select pincode_id,pincode_no from pincode WHERE pincode_no='$pincode_no'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($pincode_id,$pincode_no);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				$stm->fetch();
				
				$details = array('status'=>"1",'message'=>"Delivery Available...",'pincode_id'=>"$pincode_id",'pincode_no'=>"$pincode_no");
			
				}else{
					$details = array('status'=>"0",'message'=>"Delivery not Available...");
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