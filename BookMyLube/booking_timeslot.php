<?php 
	include "../conn.php";

	$details;
	
	if(isset($_POST['booking_date']) && isset($_POST['booking_service_opt']))
	{
		if(!empty($_POST['booking_date']) && !empty($_POST['booking_service_opt']))
		{
			$booking_date = $_POST['booking_date'];
			$booking_service_opt = $_POST['booking_service_opt'];
		
			$query = "select booking_t_id from booking where booking_date = '".$booking_date."' and booking_service_opt = '".$booking_service_opt."'";
			$stm = $conn->prepare($query);
			$a = ""	;						
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($booking_t_id);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0){			
        		
        		while($stm->fetch())
        		{
        			  if($a == "")
        			  {
        			      $a .= "'$booking_t_id'";
        			  }
        			  else
        			  {
        			      $a .= ",'".$booking_t_id."'";
        			  }
        		}
        		
        		$q = "select t_id,t_timeslot from timeslot where t_id NOT IN ($a)";
        		$stm1 = $conn->prepare($q);
        		$stm1->execute();
    		    $stm1->bind_result($t_id,$t_timeslot);
    		    $stm1->store_result();
    		    $count2=$stm1->num_rows;
    		    while($stm1->fetch())
    		    {
    		        $timeslot[] = array('t_id'=>"$t_id",'t_timeslot'=>"$t_timeslot");
    		    }
        		
        		$details = array('status'=>"1",'message'=>"Success",'timeslot'=>$timeslot);
        	
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