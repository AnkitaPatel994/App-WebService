<?php 
	include "config.php";
	
	$data_back = json_decode(file_get_contents('php://input'));	
	
	$details=array();
	
	$query = "select category_id,category_title,category_img from categories";
	$stm = $conn->prepare($query);
												
	if ($stm)
	{
		$stm->execute();
		$stm->bind_result($category_id,$category_title,$category_img);
		$stm->store_result();
		$count1=$stm->num_rows;
		
		if($count1!=0){			
		
		while($stm->fetch())
		{
			$category[]=array('category_id'=>"$category_id",'category_title'=>"$category_title",'category_img'=>"images/category/$category_img");
		}
		
		$details = array('status'=>"1",'message'=>"Success",'category'=>$category);
	
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