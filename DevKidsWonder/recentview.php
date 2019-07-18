<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['ip_add']))
	{
		if(!empty($_POST['ip_add']))
		{
			$ip_add = $_POST['ip_add'];
		
			$query = "select id,pro_id,cate_id,pro_title,pro_brand_id,brand_name,pro_oprice,pro_discount,pro_price,pro_desc,pro_quantity,pro_date from products,recent_products,brands where pro_brand_id = brand_id and pro_id = recent_pro_id and ip_add = '".$ip_add."' and status = 'Available' ORDER BY rp_id DESC LIMIT 10";
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
                		
                		$query2 = "select img_id,img_pro_id,pro_img_name from product_img where img_pro_id='".$pro_id."' LIMIT 1";
        			    $stm2 = $conn->prepare($query2);
        			    $stm2->execute();
                		$stm2->bind_result($img_id,$img_pro_id,$pro_img_name);
                		$stm2->store_result();
                		$stm2->fetch();
                	
        		        $recentview[]=array('id'=>"$id",'pro_id'=>"$pro_id",'cate_id'=>"$cate_id",'pro_title'=>"$pro_title",'brand_id'=>"$pro_brand_id",'brand_name'=>"$brand_name",'pro_oprice'=>"$pro_oprice",'pro_discount'=>"$pro_discount% off",'pro_price'=>"$pro_price",'pro_desc'=>"$pro_desc",'pro_quantity'=>"$pro_quantity",'pro_date'=>"$pro_date",'rating'=>number_format($AVG,2),'product_img'=>"pro-image/$pro_img_name");
        			   
        			}
        			$details = array('status'=>"1",'message'=>"Success",'product'=>$recentview);
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