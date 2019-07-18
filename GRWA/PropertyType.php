<?php 
	include "config.php";
	
	$data_back = json_decode(file_get_contents('php://input'));	
	
	$details=array();
	
	$query = "select t_id,t_ptname,t_img from prop_type";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($t_id,$t_ptname,$t_img);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$PropertyType[]=array('id'=>"$t_id",'type'=>"$t_ptname",'img'=>"$t_img");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'PropertyType'=>$PropertyType);
	
		}else{
			$details = array('status'=>"0",'message'=>"No Category Found");
		}
	}
	else 
	{
		$details = array('status'=>"0",'message'=>"connection error exist");
	}
	$stm->close();
	
		
	echo json_encode($details);
	$conn->close();
	
	
?>