<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"e_id"}) && isset($data_back->{"e_mobile"}))
	{
		if(!empty($data_back->{"e_id"}) && !empty($data_back->{"e_mobile"}))
		{
			$e_id=$data_back->{"e_id"};
			$e_mobile=$data_back->{"e_mobile"};
			
			$q_dp="update employee_details set e_mobile = '".$e_mobile."' where e_id = '".$e_id."'";
			
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