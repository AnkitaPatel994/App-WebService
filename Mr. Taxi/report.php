<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($data_back->{"startdate"}) && isset($data_back->{"enddate"}))
	{
		if(!empty($data_back->{"startdate"}) && !empty($data_back->{"enddate"}))
		{
			
			$startdate=$data_back->{"startdate"};
			$enddate=$data_back->{"enddate"};
			
			$query = "select c_id,c_dshift,d_name,c_c_name,c_cost,c_cash,c_gascredit,c_gascash,c_maintenance,c_commission,c_gst,c_cashleft,c_total,c_date from driver,dailycashout where c_d_id = d_id and c_date >= '".$startdate."' and  c_date <= '".$enddate."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
				$stm->execute();
				$stm->bind_result($c_id,$c_dshift,$d_name,$c_c_name,$c_cost,$c_cash,$c_gascredit,$c_gascash,$c_maintenance,$c_commission,$c_gst,$c_cashleft,$c_total,$c_date);
				$stm->store_result();
				$count1=$stm->num_rows;
				
				if($count1!=0)
				{
					while($stm->fetch())
					{
						$vehicle[]=array('c_id'=>"$c_id",'c_dshift'=>"$c_dshift",'d_name'=>"$d_name",'client_name'=>"$c_c_name",'c_cost'=>"$c_cost",'c_cash'=>"$c_cash",'c_gascredit'=>"$c_gascredit",'c_gascash'=>"$c_gascash",'c_maintenance'=>"$c_maintenance",'c_commission'=>"$c_commission",'c_gst'=>"$c_gst",'c_cashleft'=>"$c_cashleft",'c_total'=>"$c_total",'c_date'=>"$c_date");
					}
					
					$details = array('status'=>"1",'message'=>"Success",'vehicle'=>$vehicle);
				}
				else
				{
					$details = array('status'=>"0",'message'=>"No Data Found");
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