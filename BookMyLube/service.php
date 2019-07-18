<?php 
	include "../conn.php";

	$details;
	
	$query = "select service_id,service_name,service_price,service_ex_period from service";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($service_id,$service_name,$service_price,$service_ex_period);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$service[]=array('service_id'=>"$service_id",'service_name'=>"$service_name",'service_price'=>"$service_price",'service_ex_period'=>"$service_ex_period");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'service'=>$service);
	
		}else{
			$details = array('status'=>"0",'message'=>"No Data Found");
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