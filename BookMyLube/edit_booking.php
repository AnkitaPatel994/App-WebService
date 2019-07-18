<?php
	include "../conn.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['booking_id']) && isset($_POST['booking_service_name']) && isset($_POST['booking_t_id']))
	{
		if(!empty($_POST['booking_id']) && !empty($_POST['booking_service_name']) && !empty($_POST['booking_t_id']))
		{
			$booking_id = $_POST['booking_id'];
			$booking_service_name = $_POST['booking_service_name'];
			$booking_t_id = $_POST['booking_t_id'];
			
			$q_dp="update booking set booking_service_name = '".$booking_service_name."',booking_t_id = '".$booking_t_id."' where booking_id = '".$booking_id."'";
			
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