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
			$wishlist_size_id = $_POST['wishlist_size_name'];
			
			$query = "select whishlist_customer_id,whishlist_pro_id,wishlist_size_id from wishlist where whishlist_pro_id = '".$whishlist_pro_id."' and whishlist_customer_id = '".$whishlist_customer_id."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($whishlist_customer_id,$whishlist_pro_id,$wishlist_size_id);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"1",'message'=>"alredy insert");
        		}
        		else
        		{
        		    $q_dp="insert into wishlist(whishlist_customer_id,whishlist_pro_id,wishlist_size_id) values(?,?,?)";
        			$stdp=$conn->prepare($q_dp);
        			
        			if($stdp)
        			{
        				$stdp->bind_param('sss',$whishlist_customer_id,$whishlist_pro_id,$wishlist_size_id);
        				$stdp->execute();
        				$i_id=$stdp->insert_id;
        				$details = array('status'=>"1",'message'=>"success", 'id'=>$i_id);
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