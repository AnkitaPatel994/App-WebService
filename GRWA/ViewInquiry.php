<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"UserId"}))
	{
		if(!empty($data_back->{"UserId"}))
		{
			$UserId = $data_back->{"UserId"};
		
			$query = "select i_id,i_name,i_phone,i_email,i_message from inquiry where i_e_id = '$UserId'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($i_id,$i_name,$i_phone,$i_email,$i_message);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				
				while($stm->fetch())
				{
					$Inquiry[]=array('i_id'=>"$i_id",'i_name'=>"$i_name",'i_phone'=>"$i_phone",'i_email'=>"$i_email",'i_message'=>"$i_message");
				}
				
				$details = array('status'=>"1",'message'=>"Success",'Inquiry'=>$Inquiry);
			
				}else{
					$details = array('status'=>"0",'message'=>"No Category Found");
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