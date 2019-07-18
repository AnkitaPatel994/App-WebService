<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"email"}) && isset($data_back->{"pass"}))
	{
		if(!empty($data_back->{"email"}) && !empty($data_back->{"pass"}))
		{
			$email = $data_back->{"email"};
			$pass = $data_back->{"pass"};
		
			$query = "select e_id,e_name,e_pic,e_email,e_mobile,e_pass from employee_details WHERE e_email='$email' and e_pass='$pass'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($e_id,$e_name,$e_pic,$e_email,$e_mobile,$e_pass);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				
				while($stm->fetch())
				{
					$Employee[]=array('id'=>"$e_id",'name'=>"$e_name",'pic'=>"$e_pic",'email'=>"$e_email",'mobile'=>"$e_mobile",'pass'=>"$e_pass");
				}
				
				$details = array('status'=>"1",'message'=>"Success",'Employee'=>$Employee);
			
				}else{
					$details = array('status'=>"0",'message'=>"Username and password Wrong");
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