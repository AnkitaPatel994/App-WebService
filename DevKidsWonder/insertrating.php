<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['rating_customer_id']) && isset($_POST['rating_pro_id']) && isset($_POST['rating']) && isset($_POST['review']))
	{
		if(!empty($_POST['rating_customer_id']) && !empty($_POST['rating_pro_id']) && !empty($_POST['rating']) && !empty($_POST['review']))
		{
			$rating_customer_id = $_POST['rating_customer_id'];
			$rating_pro_id = $_POST['rating_pro_id'];
			$rating = $_POST['rating'];
			$review = $_POST['review'];
			
			$query = "select rating_customer_id,rating_pro_id,rating,review from pro_ratings where rating_customer_id = '".$rating_customer_id."' and rating_pro_id = '".$rating_pro_id."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($rating_customer_id,$rating_pro_id,$rating,$review);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"1",'message'=>"Alredy Product rating...");
        		}
        		else
        		{
        		    $q_dp="insert into pro_ratings(rating_customer_id,rating_pro_id,rating,review) values(?,?,?,?)";
        			$stdp=$conn->prepare($q_dp);
        			
        			if($stdp)
        			{
        				$stdp->bind_param('ssss',$rating_customer_id,$rating_pro_id,$rating,$review);
        				$stdp->execute();
        				$i_id=$stdp->insert_id;
        				$details = array('status'=>"1",'message'=>"Product rating Successfully...", 'id'=>$i_id);
        			}
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