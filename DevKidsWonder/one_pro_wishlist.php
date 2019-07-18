<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['customer_id']) && isset($_POST['pro_id']))
	{
		if(!empty($_POST['customer_id']) && !empty($_POST['pro_id']))
		{
			$whishlist_customer_id = $_POST['customer_id'];
			$whishlist_pro_id = $_POST['pro_id'];
			
			$query = "select whishlist_customer_id,whishlist_pro_id from wishlist where whishlist_pro_id = '".$whishlist_pro_id."' and whishlist_customer_id = '".$whishlist_customer_id."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($whishlist_customer_id,$whishlist_pro_id);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"1",'message'=>"1 Product");
        		}
        		else
        		{
        		    $details = array('status'=>"0",'message'=>"not Product");
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