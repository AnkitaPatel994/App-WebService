<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['customer_id']))
	{
		if(!empty($_POST['customer_id']))
		{
			$cart_customer_id = $_POST['customer_id'];
		
			$query = "select sum(cart_pro_quantity*cart_pro_price) as carttotal from cart where cart_customer_id = '".$cart_customer_id."'";
        	$stm = $conn->prepare($query);
        												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($carttotal);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $stm->fetch();
        			$details = array('status'=>"1",'message'=>"Success",'cart_total'=>"$carttotal");
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