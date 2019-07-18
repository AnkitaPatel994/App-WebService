<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['c_id_shipping']) && isset($_POST['shipping_address']))
	{
		if(!empty($_POST['c_id_shipping']) && !empty($_POST['shipping_address']))
		{
			$c_id_shipping = $_POST['c_id_shipping'];
			$shipping_address = $_POST['shipping_address'];
			
			$query = "select c_id_shipping,shipping_address from shipping_address where c_id_shipping = '".$c_id_shipping."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($c_id_shipping,$shipping_address);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"1",'message'=>"Alredy shipping");
        		}
        		else
        		{
        		    $q_dp="insert into shipping_address(c_id_shipping,shipping_address) values(?,?)";
        			$stdp=$conn->prepare($q_dp);
        			
        			if($stdp)
        			{
        				$stdp->bind_param('ss',$c_id_shipping,$shipping_address);
        				$stdp->execute();
        				$i_id=$stdp->insert_id;
        				$details = array('status'=>"1",'message'=>"Insert Your shipping..", 'id'=>$i_id);
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