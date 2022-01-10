<?php
include("connection.php");
ini_set("max_execution_time",0);
// $TRUNCATE = "TRUNCATE DITPStuff_ActivityStrategicMOC";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from Activity_PreAmount_Detail_ELearning";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        print_r($data_loop);
        die();
        // $DITP_ONE = "INSERT INTO `Activity_PreAmount_Detail_ELearning`(`StrategicMOCRowNo`, `Activity_id`, `Strategic_id`, `Strategic_Name`) VALUES ('".$data_loop['StrategicMOCRowNo']."','".$data_loop['Activity_id']."','".$data_loop['Strategic_id']."','".$data_loop['Strategic_Name']."')";
        // print_r($DITP_ONE);
        // if ($mysqli->query($DITP_ONE) === FALSE ) {
        //     echo "Failed to connect to MySQL: " . $mysqli->error;
        //     die();
        // } 
    }
}
echo "Success!!"
?>