<?php 
	include "../conn.php";

	$details;
	
	if(isset($_POST['booking_email']))
	{
		if(!empty($_POST['booking_email']))
		{
			$booking_email = $_POST['booking_email'];
		
			$query = "select booking_id,booking_name,booking_email,booking_phone,booking_service_opt,booking_address,booking_service_name,booking_date,booking_make,booking_model,booking_msgyear,booking_enginetype,booking_vanplateno,booking_comment,booking_t_id,t_timeslot,booking_time from booking,timeslot WHERE booking_email='$booking_email' and booking_t_id=t_id and booking_status = 'Pending'";
			$stm = $conn->prepare($query);
												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($booking_id,$booking_name,$booking_email,$booking_phone,$booking_service_opt,$booking_address,$booking_service_name,$booking_date,$booking_make,$booking_model,$booking_msgyear,$booking_enginetype,$booking_vanplateno,$booking_comment,$booking_t_id,$t_timeslot,$booking_time);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0){			
        		
        		while($stm->fetch())
        		{
        		    $startDate = date('d-m-Y H:i:s');
        		    
        		    $bookDate = strtotime($booking_time) + 60*60*24*1;
        		    
        		    $endDate = date('d-m-Y H:i:s',$bookDate);
        		    
        		    $AvailableDate;
        		    
        		    if($endDate < $startDate)
        		    {
        		        $AvailableDate = "no";
        		    }
        		    else
        		    {
        		        $AvailableDate = "yes";
        		    }
        		    
        			$BookingList[]=array('booking_id'=>"$booking_id",'booking_name'=>"$booking_name",'booking_email'=>"$booking_email",'booking_phone'=>"$booking_phone",'booking_service_opt'=>"$booking_service_opt",'booking_address'=>"$booking_address",'booking_service_name'=>"$booking_service_name",'booking_date'=>"$booking_date",'booking_make'=>"$booking_make",'booking_model'=>"$booking_model",'booking_msgyear'=>"$booking_msgyear",'booking_enginetype'=>"$booking_enginetype",'booking_vanplateno'=>"$booking_vanplateno",'booking_comment'=>"$booking_comment",'booking_t_id'=>"$booking_t_id",'t_timeslot'=>"$t_timeslot",'booking_time'=>"$AvailableDate");
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