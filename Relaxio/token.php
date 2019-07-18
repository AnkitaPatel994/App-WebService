<?php
	include "config.php";
	
	$details;
	
	if(isset($_POST['wifi_mac']) && isset($_POST['token']))
	{
		if(!empty($_POST['wifi_mac']) && !empty($_POST['token']))
		{
			$wifi_mac = $_POST['wifi_mac'];
			$token = $_POST['token'];
		
			$query = "select t_id,wifi_mac from token WHERE wifi_mac='$wifi_mac'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($t_id,$wifi_mac);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0)
				{
					$details = array('status'=>"1",'message'=>"Tokan Available");
				}
				else
				{
					$q_dp="insert into token(wifi_mac,token) values(?,?)";
					$stdp=$conn->prepare($q_dp);
					$stdp->bind_param('ss',$wifi_mac,$token);
					$stdp->execute();
					$t_id=$stdp->insert_id;
					$details = array('status'=>"1",'message'=>"success", 't_id'=>$t_id);
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