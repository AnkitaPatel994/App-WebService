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
		
			$query = "select id,pro_id,cate_id,pro_title,pro_brand_id,brand_name,pro_oprice,pro_discount,pro_price,pro_desc,pro_quantity,cart_pro_quantity,pro_date,cart_size_id from products,cart,brands where pro_brand_id = brand_id and pro_id = cart_pro_id and cart_customer_id = '".$cart_customer_id."' and status = 'Available'";
        	$stm = $conn->prepare($query);
        												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($id,$pro_id,$cate_id,$pro_title,$pro_brand_id,$brand_name,$pro_oprice,$pro_discount,$pro_price,$pro_desc,$pro_quantity,$cart_pro_quantity,$pro_date,$cart_size_id);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        			while($stm->fetch())
        			{
        			    $query1 = "select AVG(rating) from pro_ratings where rating_pro_id='".$pro_id."'";
        			    $stm1 = $conn->prepare($query1);
        			    $stm1->execute();
                		$stm1->bind_result($AVG);
                		$stm1->store_result();
                		$count2=$stm1->num_rows;
                		$stm1->fetch();
                		
                		$query2 = "select img_id,img_pro_id,pro_img_name from product_img where img_pro_id='".$pro_id."' LIMIT 1";
        			    $stm2 = $conn->prepare($query2);
        			    $stm2->execute();
                		$stm2->bind_result($img_id,$img_pro_id,$pro_img_name);
                		$stm2->store_result();
                		$productimg = array();
                	    while($stm2->fetch())	
            	        {
            	           $productimg[] = array('img_id'=>"$img_id",'img_pro_id'=>"$img_pro_id",'pro_img_name'=>"pro-image/$pro_img_name");
            	        }
            	        
            	        $query3 = "select s_id,size,size_qty,size_price,size_discount from size where s_pro_id = '".$pro_id."' and size = '".$cart_size_id."'";
        			    $stm3 = $conn->prepare($query3);
        			    $stm3->execute();
                		$stm3->bind_result($s_id,$size,$size_qty,$size_price,$size_discount);
                		$stm3->store_result();
                		$count3=$stm1->num_rows;
                		$productsize = array();
                	    while($stm3->fetch())	
            	        {
            	           $productsize[] = array('s_id'=>"$s_id",'size_name'=>"$size",'size_qty'=>"$size_qty",'size_price'=>"$size_price",'size_discount'=>"$size_discount");
            	        }
            	        
                	
        		        $cart[]=array('id'=>"$id",'pro_id'=>"$pro_id",'cate_id'=>"$cate_id",'pro_title'=>"$pro_title",'brand_id'=>"$pro_brand_id",'brand_name'=>"$brand_name",'pro_oprice'=>"$pro_oprice",'pro_discount'=>"$pro_discount",'pro_price'=>"$pro_price",'pro_desc'=>"$pro_desc",'pro_quantity'=>"$pro_quantity",'cart_pro_quantity'=>"$cart_pro_quantity",'pro_date'=>"$pro_date",'rating'=>number_format($AVG,2),'product_img'=>"pro-image/$pro_img_name",'pro_size'=>$productsize);
        			   
        			}
        			$details = array('status'=>"1",'message'=>"Success",'cart'=>$cart);
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