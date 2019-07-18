<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['pro_id']))
	{
		if(!empty($_POST['pro_id']))
		{
			$img_pro_id=$_POST['pro_id'];
			
			$query = "select img_id,img_pro_id,pro_img_name from product_img where img_pro_id = '".$img_pro_id."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($img_id,$img_pro_id,$pro_img_name);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    while($stm->fetch())
        			{
        		        $ProductImg[]=array('img_id'=>"$img_id",'img_pro_id'=>"$img_pro_id",'pro_img_name'=>"pro-image/$pro_img_name");
        			}
        			$details = array('status'=>"1",'message'=>"Success",'ProductImg'=>$ProductImg);
        		}
        		else
        		{
        		    $details = array('status'=>"0",'message'=>"No Category Found");
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