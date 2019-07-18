<?php
	include "../conn.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['booking_id']) && isset($_POST['booking_status']) && isset($_POST['booking_price']) && isset($_POST['booking_remind_date']) && isset($_POST['booking_admin_comment']))
	{
		if(!empty($_POST['booking_id']) && !empty($_POST['booking_status']) && !empty($_POST['booking_price']) && !empty($_POST['booking_remind_date']) && !empty($_POST['booking_admin_comment']))
		{
			$booking_id = $_POST['booking_id'];
			$booking_status = $_POST['booking_status'];
			$booking_price = $_POST['booking_price'];
			$booking_remind_date = $_POST['booking_remind_date'];
			$booking_admin_comment = $_POST['booking_admin_comment'];
			
			$q_dp="update booking set booking_status = '".$booking_status."',booking_price = '".$booking_price."',booking_remind_date = '".$booking_remind_date."',booking_admin_comment = '".$booking_admin_comment."' where booking_id = '".$booking_id."'";
			
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