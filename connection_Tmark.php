<?php
    $mysqli = new mysqli("10.8.99.131","oneuat","Ibusiness19#","oneuat");
    // Check connection
    if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
    }else{
    echo "connected Mysqli";
    }
    
    $mysqlis = new mysqli("10.8.99.131","oneuat","Ibusiness19#","oneuat_dev");
    // Check connection
    if ($mysqlis->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqlis->connect_error;
    exit();
    }else{
    echo "connected Mysqli uat";
    }

    $Tmark = new mysqli("103.225.168.156" , "ditpone", "8tZFTXUHQGU[5Bcu", "tm2022");
    // Check connection
    if ($Tmark->connect_errno) {
    echo "Failed to connect to MySQL Tmark: " . $Tmark->connect_error;
    exit();
    }else{
    echo "connected Mysqli Tmark";
    }
?>

