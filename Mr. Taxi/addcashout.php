<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"c_dshift"}) && isset($data_back->{"c_d_id"}) && isset($data_back->{"c_c_name"}) && isset($data_back->{"c_cost"}))
	{
		if(!empty($data_back->{"c_dshift"}) && !empty($data_back->{"c_d_id"}) && !empty($data_back->{"c_c_name"}) && !empty($data_back->{"c_cost"}))
		{
			$c_dshift = $data_back->{"c_dshift"};
			$c_d_id = $data_back->{"c_d_id"};
			$c_c_name = $data_back->{"c_c_name"};
			$c_cost = $data_back->{"c_cost"};
			$c_cash = $data_back->{"c_cash"};
			$c_gascredit = $data_back->{"c_gascredit"};
			$c_gascash = $data_back->{"c_gascash"};
			$c_maintenance = $data_back->{"c_maintenance"};
			$c_commission = $data_back->{"c_commission"};
			$c_gst = $data_back->{"c_gst"};
			$c_cashleft = $data_back->{"c_cashleft"};
			$c_total = $data_back->{"c_total"};
			$c_date = $data_back->{"c_date"};
			
			$q_dp="insert into dailycashout(c_dshift,c_d_id,c_c_name,c_cost,c_cash,c_gascredit,c_gascash,c_maintenance,c_commission,c_gst,c_cashleft,c_total,c_date) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('sssssssssssss',$c_dshift,$c_d_id,$c_c_name,$c_cost,$c_cash,$c_gascredit,$c_gascash,$c_maintenance,$c_commission,$c_gst,$c_cashleft,$c_total,$c_date);
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