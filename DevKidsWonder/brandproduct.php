<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"brand_id"}))
	{
		if(!empty($data_back->{"brand_id"}))
		{
			$brand_id = $data_back->{"brand_id"};
		
			$query = "select id,pro_id,cate_id,pro_title,pro_brand_id,brand_name,pro_oprice,pro_discount,pro_price,pro_desc,pro_quantity,pro_date from products,brands where pro_brand_id = brand_id and pro_brand_id = '".$brand_id."' and status = 'Available'";
        	$stm = $conn->prepare($query);
        												
        	if ($stm)
        	{
        		$stm->execute();
        		$stm->bind_result($id,$pro_id,$cate_id,$pro_title,$pro_brand_id,$brand_name,$pro_oprice,$pro_discount,$pro_price,$pro_desc,$pro_quantity,$pro_date);
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
                		
                		$query2 = "select img_id,img_pro_id,pro_img_name from product_img where img_pro_id='".$pro_id."'";
        			    $stm2 = $conn->prepare($query2);
        			    $stm2->execute();
                		$stm2->bind_result($img_id,$img_pro_id,$pro_img_name);
                		$stm2->store_result();
                		$productimg = array();
                	    while($stm2->fetch())	
            	        {
            	           $productimg[] = array('img_id'=>"$img_id",'img_pro_id'=>"$img_pro_id",'pro_img_name'=>"pro-image/$pro_img_name");
            	        }
            	        
        		        $brandproduct[]=array('id'=>"$id",'pro_id'=>"$pro_id",'cate_id'=>"$cate_id",'pro_title'=>"$pro_title",'brand_id'=>"$pro_brand_id",'brand_name'=>"$brand_name",'pro_oprice'=>"$pro_oprice",'pro_discount'=>"$pro_discount%off",'pro_price'=>"$pro_price",'pro_desc'=>"$pro_desc",'pro_quantity'=>"$pro_quantity",'pro_date'=>"$pro_date",'rating'=>round($AVG,2),'product_img'=>"pro-image/$pro_img_name");
        			   
        			}
        			$details = array('status'=>"1",'message'=>"Success",'brandproduct'=>$brandproduct);
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