<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	/*$sizeschart = array();*/
	
	$query = "select id,pro_id,cate_id,pro_title,pro_brand_id,brand_name,pro_oprice,pro_discount,pro_price,pro_desc,pro_quantity,pro_date from products,brands where pro_brand_id = brand_id and best_selling_id = 'on' and status = 'Available'";
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
        		
        		$query2 = "select pro_img_name from product_img where img_pro_id='".$pro_id."' LIMIT 1";
			    $stm2 = $conn->prepare($query2);
			    $stm2->execute();
        		$stm2->bind_result($pro_img_name);
        		$stm2->store_result();
        		$stm2->fetch();
        		
        		/*$query3 = "select pro_img_name from product_img where img_pro_id='".$pro_id."'";
			    $stm3 = $conn->prepare($query3);
			    $stm3->execute();
        		$stm3->bind_result($pro_img_name);
        		$stm3->store_result();
        		$productimg = array();
        	    while($stm3->fetch())	
    	        {
    	           $productimg[] = array('pro_img_name'=>"pro-image/$pro_img_name");
    	        }
    	        
    	        $query4 = "select s_id,s_pro_id,size,size_qty,size_price,size_discount,size_chart_img from size where s_pro_id = '".$pro_id."'";
			    $stm4 = $conn->prepare($query4);
			    $stm4->execute();
        		$stm4->bind_result($s_id,$s_pro_id,$size,$size_qty,$size_price,$size_discount,$size_chart_img);
        		$stm4->store_result();
        		$productsize = array();
        	    while($stm4->fetch())	
    	        {
    	           $productsize[] = array('s_id'=>"$s_id",'s_pro_id'=>"$s_pro_id",'size'=>"$size",'size_qty'=>"$size_qty",'size_price'=>"$size_price",'size_discount'=>"$size_discount",'size_chart_img'=>"$size_chart_img");
    	        }*/
        	
		        $bestselling[]=array('id'=>"$id",'pro_id'=>"$pro_id",'cate_id'=>"$cate_id",'pro_title'=>"$pro_title",'brand_id'=>"$pro_brand_id",'brand_name'=>"$brand_name",'pro_oprice'=>"$pro_oprice",'pro_discount'=>"$pro_discount% off",'pro_price'=>"$pro_price",'pro_desc'=>"$pro_desc",'pro_quantity'=>"$pro_quantity",'pro_date'=>"$pro_date",'rating'=>number_format($AVG,2),'product_img'=>"pro-image/$pro_img_name");
			   
			}
			$details = array('status'=>"1",'message'=>"Success",'bestselling'=>$bestselling);
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
	
	echo json_encode($details);
	
	$conn->close();
?>