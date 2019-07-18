<?php 
	include "config.php";
	
	$data_back = json_decode(file_get_contents('php://input'));	
	
	$details=array();
	
	$query = "select brand_id,brand_name,brand_img from brands";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($brand_id,$brand_name,$brand_img);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$brand[]=array('brand_id'=>"$brand_id",'brand_name'=>"$brand_name",'brand_img'=>"images/brand/$brand_img");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'brand'=>$brand);
	
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