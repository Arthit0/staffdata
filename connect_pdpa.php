<?php
$serverName = "10.8.98.12";
$connectionInfo = array( "Database"=>"PDPA_DITP", "UID"=>"sa", "PWD"=>"password" , "CharacterSet" => "UTF-8");
$conn_ditp = sqlsrv_connect( $serverName, $connectionInfo);
if(!$conn_ditp) {
    die( print_r( sqlsrv_errors(), true));
}else{

    echo "connected";
}

?>

