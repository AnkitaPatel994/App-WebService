<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['customer_id']))
	{
		if(!empty($_POST['customer_id']))
		{
			$order_customer_id = $_POST['customer_id'];
		
			$query = "select order_id,invoice_no,order_date,total,shipping_id,order_status from customer_orders,invoice_details where invoice_no = inv_ord_id and order_customer_id = '".$order_customer_id."' GROUP BY invoice_no ORDER BY order_date DESC ";
        	$stm = $conn->prepare($query);
        												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($order_id,$invoice_no,$order_date,$total,$shipping_id,$order_status);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        			while($stm->fetch())
        			{   
        			    
        		        $order[]=array('order_id'=>"$order_id",'invoice_no'=>"$invoice_no",'order_date'=>"$order_date",'total'=>"$total",'shipping_id'=>"$shipping_id",'order_status'=>"$order_status");
        			   
        			}
        			
        			$details = array('status'=>"1",'message'=>"Success",'order'=>$order);
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