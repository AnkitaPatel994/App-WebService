<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"e_id"}) && isset($data_back->{"e_pic"}))
	{
		if(!empty($data_back->{"e_id"}) && !empty($data_back->{"e_pic"}))
		{
			$e_id=$data_back->{"e_id"};
			
			$data=$data_back->{"e_pic"};
			$data = str_replace('data:image/png;base64,', '',$data);
			$data = base64_decode($data);
			$file = 'img/'. uniqid() . '.jpeg';
			$success = file_put_contents($file, $data);
			
			$q_dp="update employee_details set e_pic = '".$file."' where e_id = '".$e_id."'";
			
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