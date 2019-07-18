<?php 
	include "config.php";
	
	$data_back = json_decode(file_get_contents('php://input'));	
	
	$details=array();
	
	$query = "select s_id,s_img,s_color,s_sound from sound";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($s_id,$s_img,$s_color,$s_sound);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$Sound[]=array('s_id'=>"$s_id",'s_img'=>"img/$s_img",'s_color'=>"$s_color",'s_sound'=>"sound/$s_sound");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'Sound'=>$Sound);
	
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