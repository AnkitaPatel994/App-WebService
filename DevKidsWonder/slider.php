<?php 
	include "config.php";
	
	$data_back = json_decode(file_get_contents('php://input'));	
	
	$details=array();
	
	$query = "select banner_id,banner_img_name from banner_img";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($banner_id,$banner_img_name);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$slider[]=array('id'=>"$banner_id",'banner'=>"images/slider/$banner_img_name");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'slider'=>$slider);
	
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