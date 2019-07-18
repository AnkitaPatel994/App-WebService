<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"i_name"}) && isset($data_back->{"i_phone"}) && isset($data_back->{"i_email"}) && isset($data_back->{"i_message"}) && isset($data_back->{"i_e_id"}))
	{
		if(!empty($data_back->{"i_name"}) && !empty($data_back->{"i_phone"}) && !empty($data_back->{"i_email"}) && !empty($data_back->{"i_message"}) && !empty($data_back->{"i_e_id"}))
		{
			$i_name=$data_back->{"i_name"};
			$i_phone=$data_back->{"i_phone"};
			$i_email =$data_back->{"i_email"};
			$i_message=$data_back->{"i_message"};
			$i_e_id=$data_back->{"i_e_id"};
			
			$q_dp="insert into inquiry(i_name,i_phone,i_email,i_message,i_e_id) values(?,?,?,?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('ssssi',$i_name,$i_phone,$i_email,$i_message,$i_e_id);
				$stdp->execute();
				$i_id=$stdp->insert_id;
				$details = array('status'=>"1",'message'=>"success", 'id'=>$i_id);
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