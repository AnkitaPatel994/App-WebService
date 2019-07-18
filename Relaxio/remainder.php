<?php
include 'notification_config.php';
$response = array();

$result_1 = mysqli_query($conn, "SELECT * FROM `token` ");
if (mysqli_num_rows($result_1) > 0) {
    while($row_1 = mysqli_fetch_assoc($result_1)) {
        
        $wifi_mac = $row_1["wifi_mac"];
        
        $result_11 = mysqli_query($conn, "SELECT * FROM `token` WHERE `wifi_mac`='$wifi_mac' ");
        if (mysqli_num_rows($result_11) > 0) {
            while($row_11 = mysqli_fetch_assoc($result_11)) {
                $regId = $row_11["token"];
                
                $payload = array('vvData' => $wifi_mac);
                $Title = "Relaxio";
                $Message = " Hii... Goodmorning... ";
                
                if(Send_FCM($regId,$payload, $Title, $Message)) {
                    $response['msg'] = 'success';
                } else {
                    $response['msg'] = 'failure';
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