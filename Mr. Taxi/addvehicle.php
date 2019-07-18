<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"v_name"}) && isset($data_back->{"v_no"}))
	{
		if(!empty($data_back->{"v_name"}) && !empty($data_back->{"v_no"}))
		{
			$v_name=$data_back->{"v_name"};
			$v_no=$data_back->{"v_no"};
			
			$q_dp="insert into vehicle(v_name,v_no) values(?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('ss',$v_name,$v_no);
				$stdp->execute();
				$v_id=$stdp->insert_id;
				$details = array('status'=>"1",'message'=>"success", 'id'=>$v_id);
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