<?php 
	include "../conn.php";

	$details;
	
	$query = "select s_id,s_img from slider";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($s_id,$s_img);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$slider[]=array('id'=>"$s_id",'banner'=>"upload/$s_img");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'slider'=>$slider);
	
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