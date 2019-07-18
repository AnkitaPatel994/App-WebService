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
		
			$query = "select e_id,e_name,e_pic,e_email,e_mobile from employee_details where e_id = '$UserId'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($e_id,$e_name,$e_pic,$e_email,$e_mobile);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				
				while($stm->fetch())
				{
					$Employee[]=array('e_id'=>"$e_id",'e_name'=>"$e_name",'e_pic'=>"$e_pic",'e_email'=>"$e_email",'e_mobile'=>"$e_mobile");
				}
				
				$details = array('status'=>"1",'message'=>"Success",'Employee'=>$Employee);
			
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