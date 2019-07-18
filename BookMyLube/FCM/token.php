<?php
include 'config.php';
$result = array();

if (isset($_POST['device_type']) && isset($_POST['wifi_mac']) && isset($_POST['device_token']) && isset($_POST['email'])) {
    
    $device_type = $_POST['device_type'];
    $device_token = $_POST['device_token'];
    $wifi_mac = $_POST['wifi_mac'];
    $email = $_POST['email'];
    
    $query = mysqli_query($conn, "SELECT * FROM `token` WHERE `wifi_mac`='$wifi_mac'") or die ("data not selected");
    if (mysqli_num_rows($query) > 0) {
        if (mysqli_num_rows($query) > 1) {
            // 1 Karta vadhare Device_id Hoy To All Delete Device_id Row
            if (mysqli_query($conn, "DELETE FROM `token` WHERE `wifi_mac`='$wifi_mac'")) {
                $sql = "INSERT INTO `token` (`device_type`, `booking_email`, `wifi_mac`, `token`) VALUES ('$device_type', '$email', '$wifi_mac', '$device_token')";
                if (mysqli_query($conn, $sql)) {
                    $result["status"] = "true";
                } else {
                    $result["status"] = "false";
                }
            } else {
                $result["status"] = "false";
            }
        }else{
            // Update Token
            $sql_update = "UPDATE `token` SET `device_type` = '$device_type', `booking_email` = '$email', `token` = '$device_token' WHERE `wifi_mac` = '$wifi_mac'";
            if (mysqli_query($conn, $sql_update)) {
                $result["status"] = "true";
            } else {
                $result["status"] = "false";
            }
        }
    } else {
        // New Token
        $sql_new = "INSERT INTO `token` (`device_type`, `booking_email`, `wifi_mac`, `token`) VALUES ('$device_type', '$email', '$wifi_mac', '$device_token')";
        if (mysqli_query($conn, $sql_new)) {
            $result["status"] = "true";
        } else {
            $result["status"] = "false";
        }
    }
    
    
} else if (isset($_POST['device_type']) && isset($_POST['wifi_mac']) && isset($_POST['device_token'])) {
    
    $device_type = $_POST['device_type'];
    $device_token = $_POST['device_token'];
    $wifi_mac = $_POST['wifi_mac'];

    $query = mysqli_query($conn, "SELECT * FROM `token` WHERE `wifi_mac`='$wifi_mac'") or die ("data not selected");
    if (mysqli_num_rows($query) > 0) {
        if (mysqli_num_rows($query) > 1) {
            // 1 Karta vadhare Device_id Hoy To All Delete Device_id Row
            if (mysqli_query($conn, "DELETE FROM `token` WHERE `wifi_mac`='$wifi_mac'")) {
                $sql = "INSERT INTO `token` (`device_type`,`wifi_mac`, `token`) VALUES ('$device_type', '$wifi_mac', '$device_token')";
                if (mysqli_query($conn, $sql)) {
                    $result["status"] = "true";
                } else {
                    $result["status"] = "false";
                }
            } else {
                $result["status"] = "false";
            }
        }else{
            // Update Token
            $sql_update = "UPDATE `token` SET `device_type` = '$device_type', `token` = '$device_token' WHERE `wifi_mac` = '$wifi_mac'";
            if (mysqli_query($conn, $sql_update)) {
                $result["status"] = "true";
            } else {
                $result["status"] = "false";
            }
        }
    } else {
        // New Token
        $sql_new = "INSERT INTO `token`(`device_type`, `wifi_mac`, `token`) VALUES ('$device_type','$wifi_mac', '$device_token')";
        if (mysqli_query($conn, $sql_new)) {
            $result["status"] = "true";
        } else {
            $result["status"] = "false";
        }
    }
    
} else {
    $result["status"] = "false";
}
echo json_encode($result);
?>