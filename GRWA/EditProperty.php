<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"p_id"}) && isset($data_back->{"p_pid"}) && isset($data_back->{"p_prize"}) && isset($data_back->{"p_type_id"}) && isset($data_back->{"p_area"}) && isset($data_back->{"p_state"}) && isset($data_back->{"p_city"}) && isset($data_back->{"p_address"}) && isset($data_back->{"p_pdes"}) && isset($data_back->{"p_e_id"}))
	{
		if(!empty($data_back->{"p_id"}) && !empty($data_back->{"p_pid"}) && !empty($data_back->{"p_prize"}) && !empty($data_back->{"p_type_id"}) && !empty($data_back->{"p_area"}) && !empty($data_back->{"p_state"}) && !empty($data_back->{"p_city"}) && !empty($data_back->{"p_address"}) && !empty($data_back->{"p_pdes"}) && !empty($data_back->{"p_e_id"}))
		{
			$p_id=$data_back->{"p_id"};
			$p_pid=$data_back->{"p_pid"};
			$p_prize=$data_back->{"p_prize"};
			$p_bhk =$data_back->{"p_bhk"};
			$p_type_id=$data_back->{"p_type_id"};
			$p_floor = $data_back->{"p_floor"};
			$p_block_no = $data_back->{"p_block_no"};
			$p_area = $data_back->{"p_area"};
			$p_yearbuilt=$data_back->{"p_yearbuilt"};
			$p_category = $data_back->{"p_category"};
			$p_state=$data_back->{"p_state"};
			$p_city=$data_back->{"p_city"};
			$p_address=$data_back->{"p_address"};
			$p_bedroom=$data_back->{"p_bedroom"};
			$p_bathroom=$data_back->{"p_bathroom"};
			$p_pdes=$data_back->{"p_pdes"};
			$p_e_id=$data_back->{"p_e_id"};
			
			if($p_type_id == 1)
			{
			    $q_dp="update properties set p_pid = '".$p_pid."', p_prize = '".$p_prize."', p_bhk = '".$p_bhk."', p_type_id = '".$p_type_id."', p_floor = '".$p_floor."', p_block_no = '".$p_block_no."', p_area = '".$p_area."', p_yearbuilt = '".$p_yearbuilt."', p_category = '".$p_category."', p_state = '".$p_state."', p_city = '".$p_city."', p_address = '".$p_address."', p_bedroom = '".$p_bedroom."', p_bathroom = '".$p_bathroom."', p_pdes = '".$p_pdes."', p_e_id = '".$p_e_id."' where p_id = '".$p_id."'";
			
    			$stdp=$conn->prepare($q_dp);
    			$stdp->execute();
    			$details = array('status'=>"1",'message'=>"success");
			}
			else
			{
			    $q_dp="update properties set p_pid = '".$p_pid."', p_prize = '".$p_prize."', p_bhk = '".$p_bhk."', p_type_id = '".$p_type_id."', p_area = '".$p_area."', p_yearbuilt = '".$p_yearbuilt."', p_state = '".$p_state."', p_city = '".$p_city."', p_address = '".$p_address."', p_bedroom = '".$p_bedroom."', p_bathroom = '".$p_bathroom."', p_pdes = '".$p_pdes."', p_e_id = '".$p_e_id."' where p_id = '".$p_id."'";
			
    			$stdp=$conn->prepare($q_dp);
    			$stdp->execute();
    			$details = array('status'=>"1",'message'=>"success");
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