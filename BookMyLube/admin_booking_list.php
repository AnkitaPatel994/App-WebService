<?php 
	include "../conn.php";

	$details;
	
	if(isset($_POST['booking_date']) && isset($_POST['booking_service_opt']) && isset($_POST['booking_status']))
	{
		if(!empty($_POST['booking_date']) && !empty($_POST['booking_service_opt']) && !empty($_POST['booking_status']))
		{
			$booking_date = $_POST['booking_date'];
			$booking_service_opt = $_POST['booking_service_opt'];
			$booking_status = $_POST['booking_status'];
		
			$query = "select booking_id,booking_name,booking_email,booking_phone,booking_address,booking_service_name,booking_date,booking_make,booking_model,booking_msgyear,booking_enginetype,booking_vanplateno,booking_comment,booking_t_id,t_timeslot,booking_time from booking,timeslot WHERE booking_date='$booking_date' and booking_service_opt = '$booking_service_opt' and booking_status='$booking_status' and booking_t_id=t_id";
			$stm = $conn->prepare($query);
												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($booking_id,$booking_name,$booking_email,$booking_phone,$booking_address,$booking_service_name,$booking_date,$booking_make,$booking_model,$booking_msgyear,$booking_enginetype,$booking_vanplateno,$booking_comment,$booking_t_id,$t_timeslot,$booking_time);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0){			
        		
        		while($stm->fetch())
        		{
        			$BookingList[]=array('booking_id'=>"$booking_id",'booking_name'=>"$booking_name",'booking_email'=>"$booking_email",'booking_phone'=>"$booking_phone",'booking_address'=>"$booking_address",'booking_service_name'=>"$booking_service_name",'booking_date'=>"$booking_date",'booking_make'=>"$booking_make",'booking_model'=>"$booking_model",'booking_msgyear'=>"$booking_msgyear",'booking_enginetype'=>"$booking_enginetype",'booking_vanplateno'=>"$booking_vanplateno",'booking_comment'=>"$booking_comment",'booking_t_id'=>"$booking_t_id",'t_timeslot'=>"$t_timeslot",'booking_time'=>"$booking_time");
        		}
        		
        		$details = array('status'=>"1",'message'=>"Success",'BookingList'=>$BookingList);
        	
        		}else{
        			$details = array('status'=>"0",'message'=>"No Data Found");
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