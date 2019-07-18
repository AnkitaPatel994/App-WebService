<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	// 
	//
	
	if(isset($data_back->{"p_prize"}) && isset($data_back->{"p_type_id"}) && isset($data_back->{"p_area"}) && isset($data_back->{"p_state"}) && isset($data_back->{"p_city"}) && isset($data_back->{"p_address"}) && isset($data_back->{"p_pdes"}) && isset($data_back->{"p_e_id"}))
	{
		if(!empty($data_back->{"p_prize"}) && !empty($data_back->{"p_type_id"}) && !empty($data_back->{"p_area"}) && !empty($data_back->{"p_state"}) && !empty($data_back->{"p_city"}) && !empty($data_back->{"p_address"}) && !empty($data_back->{"p_pdes"}) && !empty($data_back->{"p_e_id"}))
		{
		    $six_digit_random_number = mt_rand(100000, 999999);
			$p_pid="PR". $six_digit_random_number;
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
			$p_date = date("d-m-Y");
			
			$data_one = $data_back->{"p_pimg_one"};
			if($data_one == "")
			{
			    $file_one = 'img/noimg.jpg';
			}
			else
			{
			    $data_one = str_replace('data:image/png;base64,', '',$data_one);
    			$data_one = base64_decode($data_one);
    			$file_one = 'img/'. uniqid() . '.jpeg';
    			$success_one = file_put_contents($file_one, $data_one);
			}
			
			$data_two = $data_back->{"p_pimg_two"};
			if($data_two == "")
			{
			    $file_two = 'img/noimg.jpg';
			}
			else
			{
			    $data_two = str_replace('data:image/png;base64,', '',$data_two);
    			$data_two = base64_decode($data_two);
    			$file_two = 'img/'. uniqid() . '.jpeg';
    			$success_two = file_put_contents($file_two, $data_two);
			}
			
			$data_three = $data_back->{"p_pimg_three"};
			if($data_two == "")
			{
			    $file_three = 'img/noimg.jpg';
			}
			else
			{
			    $data_three = str_replace('data:image/png;base64,', '',$data_three);
    			$data_three = base64_decode($data_three);
    			$file_three = 'img/'. uniqid() . '.jpeg';
    			$success_three = file_put_contents($file_three, $data_three);
			}
			
			
			$q_dp="insert into properties(p_pid,p_pimg_one,p_pimg_two,p_pimg_three,p_prize,p_bhk,p_type_id,p_floor,p_block_no,p_area,p_yearbuilt,p_category,p_state,p_city,p_address,p_bedroom,p_bathroom,p_pdes,p_e_id,p_date) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    			$stdp=$conn->prepare($q_dp);
    			
    			if($stdp)
    			{
    				$stdp->bind_param('ssssssssssssssssssss',$p_pid,$file_one,$file_two,$file_three,$p_prize,$p_bhk,$p_type_id,$p_floor,$p_block_no,$p_area,$p_yearbuilt,$p_category,$p_state,$p_city,$p_address,$p_bedroom,$p_bathroom,$p_pdes,$p_e_id,$p_date);
    				$stdp->execute();
    				$p_id=$stdp->insert_id;
    				$details = array('status'=>"1",'message'=>"success", 'id'=>$p_id);
    			}
			
			/*if($p_type_id == 1)
			{
			    $q_dp="insert into properties(p_pid,p_pimg_one,p_pimg_two,p_pimg_three,p_prize,p_bhk,p_type_id,p_floor,p_block_no,p_area,p_yearbuilt,p_category,p_state,p_city,p_address,p_bedroom,p_bathroom,p_pdes,p_e_id,p_date) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    			$stdp=$conn->prepare($q_dp);
    			
    			if($stdp)
    			{
    				$stdp->bind_param('ssssssssssssssssssss',$p_pid,$file_one,$file_two,$file_three,$p_prize,$p_bhk,$p_type_id,$p_floor,$p_block_no,$p_area,$p_yearbuilt,$p_category,$p_state,$p_city,$p_address,$p_bedroom,$p_bathroom,$p_pdes,$p_e_id,$p_date);
    				$stdp->execute();
    				$p_id=$stdp->insert_id;
    				$details = array('status'=>"1",'message'=>"success", 'id'=>$p_id);
    			}
			}
			else
			{
			    $q_dp="insert into properties(p_pid,p_pimg_one,p_pimg_two,p_pimg_three,p_prize,p_bhk,p_type_id,p_area,p_yearbuilt,p_state,p_city,p_address,p_bedroom,p_bathroom,p_pdes,p_e_id,p_date) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    			$stdp=$conn->prepare($q_dp);
    			
    			if($stdp)
    			{
    				$stdp->bind_param('ssssisisisssiisis',$p_pid,$file_one,$file_two,$file_three,$p_prize,$p_bhk,$p_type_id,$p_area,$p_yearbuilt,$p_state,$p_city,$p_address,$p_bedroom,$p_bathroom,$p_pdes,$p_e_id,$p_date);
    				$stdp->execute();
    				$p_id=$stdp->insert_id;
    				$details = array('status'=>"1",'message'=>"success", 'id'=>$p_id);
    			}
			}*/
			
		}
		else
			$details = array('status'=>"0",'message'=>"Parameter is Empty");
	}
	else
		$details = array('status'=>"0",'message'=>"parameter missing");
	
	echo json_encode($details);
	
	$conn->close();
?>