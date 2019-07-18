<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"o_v_id"}))
	{
		if(!empty($data_back->{"o_v_id"}))
		{
			$o_v_id = $data_back->{"o_v_id"};
			$o_v_kilometer = $data_back->{"o_v_kilometer"};
			$o_cost = $data_back->{"o_cost"};
			$o_maintenance = $data_back->{"o_maintenance"};
			$o_m_cost = $data_back->{"o_m_cost"};
			$o_date = $data_back->{"o_date"};
			
			$q_dp="insert into oilchange(o_v_id,o_v_kilometer,o_cost,o_maintenance,o_m_cost,o_date) values(?,?,?,?,?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('ssssss',$o_v_id,$o_v_kilometer,$o_cost,$o_maintenance,$o_m_cost,$o_date);
				$stdp->execute();
				$o_id=$stdp->insert_id;
				$details = array('status'=>"1",'message'=>"success", 'o_id'=>$o_id);
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