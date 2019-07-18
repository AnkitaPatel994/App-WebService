<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"UserId"}) && isset($data_back->{"TypeId"}))
	{
		if(!empty($data_back->{"UserId"}) && !empty($data_back->{"TypeId"}))
		{
			$UserId = $data_back->{"UserId"};
			$TypeId = $data_back->{"TypeId"};
		
			$query = "select p_id,p_pid,p_pimg_one,p_pimg_two,p_pimg_three,p_prize,p_bhk,t_ptname,p_floor,p_block_no,p_area,p_yearbuilt,p_state,p_city,p_address,p_bedroom,p_bathroom,p_pdes,p_e_id,p_date,e_id,e_name,e_pic,e_email,e_mobile from properties,prop_type,employee_details where t_id = p_type_id and e_id = p_e_id and p_e_id = '$UserId' and p_type_id = '$TypeId'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($p_id,$p_pid,$p_pimg_one,$p_pimg_two,$p_pimg_three,$p_prize,$p_bhk,$t_ptname,$p_floor,$p_block_no,$p_area,$p_yearbuilt,$p_state,$p_city,$p_address,$p_bedroom,$p_bathroom,$p_pdes,$p_e_id,$p_date,$e_id,$e_name,$e_pic,$e_email,$e_mobile);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				
				while($stm->fetch())
				{
				    $query1 = "select COUNT(v_id) from prop_view where v_ppid = '$p_pid'";
    			    $stm1 = $conn->prepare($query1);
    			    
    			    $stm1->execute();
    				$stm1->bind_result($COUNT);
    				$stm1->store_result();
    				$count2=$stm1->num_rows;
    				while($stm1->fetch())
    				{
    				    $Properties[]=array('id'=>"$p_id",'pid'=>"$p_pid",'pimgone'=>"$p_pimg_one",'pimgtwo'=>"$p_pimg_two",'pimgthree'=>"$p_pimg_three",'pprize'=>"$p_prize",'ppbhk'=>"$p_bhk",'ptname'=>"$t_ptname",'p_floor'=>$p_floor,'p_block_no'=>$p_block_no,'pparea'=>"$p_area",'pyearbuilt'=>"$p_yearbuilt",'pstate'=>"$p_state",'pcity'=>"$p_city",'paddress'=>"$p_address",'pbedroom'=>"$p_bedroom",'pbathroom'=>"$p_bathroom",'pdes'=>"$p_pdes",'p_e_id'=>"$p_e_id",'p_date'=>"$p_date",'userid'=>"$e_id",'username'=>"$e_name",'userpic'=>"$e_pic",'useremail'=>"$e_email",'usermobile'=>"$e_mobile",'COUNT'=>"$COUNT");
    				}
					
				}
				
				$details = array('status'=>"1",'message'=>"Success",'Properties'=>$Properties);
			
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