<?php
	include "config.php";

	$details;
	
	if(isset($_POST['promo_code']))
	{
		if(!empty($_POST['promo_code']))
		{
			$promo_code = $_POST['promo_code'];
		
			$query = "select discount_rate from coupon_code WHERE promo_code='$promo_code'";
			$stm = $conn->prepare($query);
														
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($discount_rate);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0){			
				$stm->fetch();
				
				$details = array('status'=>"1",'message'=>"Coupon Code Available...",'discount_rate'=>"$discount_rate");
			
				}else{
					$details = array('status'=>"0",'message'=>"Coupon Code not Available...");
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