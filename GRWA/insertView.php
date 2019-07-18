<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"v_ppid"}) && isset($data_back->{"v_eid"}))
	{
		if(!empty($data_back->{"v_ppid"}) && !empty($data_back->{"v_eid"}))
		{
			$v_ppid=$data_back->{"v_ppid"};
			$v_eid=$data_back->{"v_eid"};
			
			$q_dp="insert into prop_view(v_ppid,v_eid) values(?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('si',$v_ppid,$v_eid);
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