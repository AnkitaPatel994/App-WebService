<?php
	include "../conn.php";
	
	$details;
	
	if(isset($_POST['booking_name']) && isset($_POST['booking_email']) && isset($_POST['booking_phone']) && isset($_POST['booking_service_opt']) && isset($_POST['booking_address']) && isset($_POST['booking_service_name']) && isset($_POST['booking_date']) && isset($_POST['booking_time']) && isset($_POST['booking_t_id']) && isset($_POST['booking_status']))
	{
		if(!empty($_POST['booking_name']) && !empty($_POST['booking_email']) && !empty($_POST['booking_phone']) && !empty($_POST['booking_service_opt']) && !empty($_POST['booking_address']) && !empty($_POST['booking_service_name']) && !empty($_POST['booking_date']) && !empty($_POST['booking_time']) && !empty($_POST['booking_t_id']) && !empty($_POST['booking_status']))
		{
			$booking_name = $_POST['booking_name'];
			$booking_email = $_POST['booking_email'];
			$booking_phone = $_POST['booking_phone'];
			$booking_service_opt = $_POST['booking_service_opt'];
			$booking_address = $_POST['booking_address'];
			$booking_service_name = $_POST['booking_service_name'];
			$booking_date = $_POST['booking_date'];
			$booking_make = $_POST['booking_make'];
			$booking_model = $_POST['booking_model'];
			$booking_msgyear = $_POST['booking_msgyear'];
			$booking_enginetype = $_POST['booking_enginetype'];
			$booking_vanplateno = $_POST['booking_vanplateno'];
			$booking_comment = $_POST['booking_comment'];
			$booking_t_id = $_POST['booking_t_id'];
			$booking_status = $_POST['booking_status'];
			$booking_time = $_POST['booking_time'];
			
			$q_dp="insert into booking(booking_name,booking_email,booking_phone,booking_service_opt,booking_address,booking_service_name,booking_date,booking_make,booking_model,booking_msgyear,booking_enginetype,booking_vanplateno,booking_comment,booking_t_id,booking_status,booking_time) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('ssssssssssssssss',$booking_name,$booking_email,$booking_phone,$booking_service_opt,$booking_address,$booking_service_name,$booking_date,$booking_make,$booking_model,$booking_msgyear,$booking_enginetype,$booking_vanplateno,$booking_comment,$booking_t_id,$booking_status,$booking_time);
				$stdp->execute();
				$booking_id=$stdp->insert_id;
				$details = array('status'=>"1",'message'=>"success", 'id'=>$booking_id);
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