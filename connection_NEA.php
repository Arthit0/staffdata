<?php
$serverName = "10.8.98.11";
$connectionInfo = array( "Database"=>"MOC_DriveDashboardDB", "UID"=>"DITPONE", "PWD"=>"DITPP@ssw0rd!@#$" , "CharacterSet" => "UTF-8");
$conn_ditp = sqlsrv_connect( $serverName, $connectionInfo);
if(!$conn_ditp) {
    die( print_r( sqlsrv_errors(), true));
}else{

    echo "connected";
}




$mysqli = new mysqli("10.8.99.131","oneuat","Ibusiness19#","oneuat");
// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}else{
  echo "connected Mysqli";
}

?>

