<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['recent_pro_id']) && isset($_POST['ip_add']))
	{
		if(!empty($_POST['recent_pro_id']) && !empty($_POST['ip_add']))
		{
			$recent_pro_id = $_POST['recent_pro_id'];
			$ip_add = $_POST['ip_add'];
			
			$q_dp="insert into recent_products(recent_pro_id,ip_add) values(?,?)";
			$stdp=$conn->prepare($q_dp);
			
			if($stdp)
			{
				$stdp->bind_param('ss',$recent_pro_id,$ip_add);
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