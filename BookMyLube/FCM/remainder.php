<?php
include 'config.php';
$response = array();

$result_1 = mysqli_query($conn, "SELECT * FROM `booking` ");
if (mysqli_num_rows($result_1) > 0) {
    while($row_1 = mysqli_fetch_assoc($result_1)) {
        //echo "booking_date: " . $row_1["booking_date"]." <--> ".$LiveDate. "<br>";
        
        $booking_email = $row_1["booking_email"];
        $booking_service_name = $row_1["booking_service_name"];
        $booking_date = $row_1["booking_date"];
        
    	$diff = strtotime($booking_date) - strtotime($LiveDate);
    	$dateDiff = round($diff / 86400);
    	/*printf("Difference between in two dates : " .$dateDiff. " Days ");
    	print "</br>";*/
        
        if($dateDiff == 2 || $dateDiff == 1){
            
            $result_11 = mysqli_query($conn, "SELECT * FROM `token` WHERE `booking_email`='$booking_email' ");
            if (mysqli_num_rows($result_11) > 0) {
                while($row_11 = mysqli_fetch_assoc($result_11)) {
                    $regId = $row_11["token"];
                    /*echo $regId;
                    print "</br>";*/
                    
                    $payload = array('vvData' => $booking_service_name." Service Date is ".$booking_date);
                    $Title = "BookmyLube";
                    $Message = $booking_service_name." Service Alert Date is ".$booking_date;
                    
                    if(Send_FCM($regId,$payload, $Title, $Message)) {
                        $response['msg'] = 'success';
                    } else {
                        $response['msg'] = 'failure';
                    }
                }
            }
            
        }
        
    }
} else {
    $response= "0 results";
}
$result_2 = mysqli_query($conn, 'SELECT * FROM `booking` ');
if (mysqli_num_rows($result_2) > 0) {
    while($row_2 = mysqli_fetch_assoc($result_2)) {
        //echo "booking_remind_date: " . $row_2["booking_remind_date"]. "<br>";

        $booking_email = $row_1["booking_email"];
        $booking_service_name = $row_1["booking_service_name"];
        $booking_remind_date = $row_2["booking_remind_date"];
        
    	$diff = strtotime($booking_remind_date) - strtotime($LiveDate);
    	$dateDiff = round($diff / 86400);
    	/*printf("Difference between in two dates : " .$dateDiff. " Days ");
    	print "</br>";*/
        
        if($dateDiff == 2 || $dateDiff == 1){
        
           $result_22 = mysqli_query($conn, "SELECT * FROM `token` WHERE `booking_email`='$booking_email' ");
            if (mysqli_num_rows($result_22) > 0) {
                while($row_22 = mysqli_fetch_assoc($result_22)) {
                    $regId = $row_22["token"];
                    
                    $payload = array('vvData' => $booking_service_name." Service Date is ".$booking_date);
                    $Title = "BookmyLube";
                    $Message = $booking_service_name." Service remainder Date is ".$booking_date;
                    
                    if(Send_FCM($regId,$payload, $Title, $Message)) {
                        $response['msg'] = 'success';
                    } else {
                        $response['msg'] = 'failure';
                    }
                    
                }
            }
            
        }
    }
} else {
    $response= "0 results";
}



//////////////////////////////////////////////////////////////////////////////
    
    /*$regId="fbICczUacZA:APA91bFDLoEzYK28_u9E_-Wel7nj8i8CZIF67PDna3rliXoTbEbiCWbC0Tb-l5J4egRuImufld1DUm2nM8VCcbbTFB7WXLE0LSBGuQ0CRRg_dKMiPnYPrLJV2xMUzeW7NqhJz1u8dc24";
    $payload = array('dataa' =>"viru");
    $Title = "My";
    $Message = "Name";
    
    if(Send_FCM($regId,$payload, $Title, $Message)){
        $response['msg'] = 'success';
    } else {
        $response['msg'] = 'failure';
    }*/
    
echo json_encode($response);

//////------- FCM
function Send_FCM($regId,$payload, $Title, $Message) {
    
    $responses = FALSE;
    // Enabling error reporting
    error_reporting(-1);
    ini_set('display_errors', 'On');
    require_once __DIR__ . '/firebase.php';
    require_once __DIR__ . '/push.php';
    $firebase = new Firebase();
    $push = new Push();

    $push->setIsBackground(FALSE);
    $push->setPayload($payload);
    $push->setTitle($Title);
    $push->setMessage($Message);

    $json = $push->getPush();

    $res = $firebase->send($regId, $json);
    
    $json_array=json_decode($res,true);
    $success = $json_array["success"];
    $failure = $json_array["failure"];

    if($success == 1){
        $responses = true;
    } else if($failure == 1){
        $responses = FALSE;
    }
    return $responses;
}

?>