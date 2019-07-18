<?php
	include "../conn.php";
	
	$details;
	
	if(isset($_POST['booking_id']))
	{
		if(!empty($_POST['booking_id']))
		{
			$booking_id = $_POST['booking_id'];
			
			$q_dp="delete from booking where booking_id = '".$booking_id."'";
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