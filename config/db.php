<?php
date_default_timezone_set('Asia/Dhaka');
$date=date('Y-m-d H:i:s');

// PHP Data Object function
try{
    $db_name = "mysql:host=localhost;dbname=poithas";
    $db_user = 'root';
    $db_pass = '';
    $pdo = new PDO($db_name, $db_user, $db_pass) or die('Connection Error: ' .mysqli_connect_errno());
	$mysqli= new mysqli("localhost", 'root', '', 'poithas');
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
    // echo "connection successfull";
} catch(PDOException $error){
    echo $error->getMessage();
}

// Get User Ip
$loc = 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';
function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$ip=getUserIP();
	
?>