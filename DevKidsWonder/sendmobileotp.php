<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
    
	$details;
	
	if(isset($_POST['mobile']))
	{
		if(!empty($_POST['mobile']))
		{
			$customer_contact = $_POST['mobile'];
			$otp = mt_rand(10000, 99999);
			
			$query = "select customer_contact from customers where customer_contact = '".$customer_contact."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($customer_name,$customer_last_name,$customer_email,$customer_contact,$customer_password);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"2",'message'=>"Alredy you are Register... Please Login...");
        		}
        		else
        		{
        		    //$q_dp="update customers set c_otp = '".$otp."' where customer_contact = '".$customer_contact."'";
			
        			$mobile = "91".$customer_contact;
        			$sms = urlencode("Your OTP is ".$otp);
        			
        			$url = "http://bulksms.digitalscoob.com/api/mt/SendSMS?user=DEVKID&password=413@@&senderid=DEVKID&channel=Trans&DCS=0&flashsms=0&number=$mobile&text=$sms&route=2";
        			file_get_contents($url);
        			
        			/*$stdp=$conn->prepare($q_dp);
        			$stdp->execute();*/
        			$details = array('status'=>"1",'message'=>"success",'otp'=>"$otp");
        		}
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