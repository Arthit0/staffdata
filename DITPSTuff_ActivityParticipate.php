<?php 
include("connection.php");
ini_set("max_execution_time",0);
// $TRUNCATE = "TRUNCATE ditpstuff_dimtimeactivity";
//     if ($mysqli->query($TRUNCATE) === FALSE ) {
//     echo "Failed to connect to MySQL: " . $mysqli->error;
//     }

$SqlServer = "SELECT * FROM  DITPSTuff_ActivityParticipate";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  

if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
   
        $DITP_ONE = "INSERT INTO `ditpstuff_activityparticipate`(`FacId`, `Activity_id`, `CorporateId`, `PersonId`, `TimeId`, `PropertyId`, `Property_Name_Th`) VALUES ('".$data_loop['FacId']."','".$data_loop['Activity_id']."','".$data_loop['CorporateId']."','".$data_loop['PersonId']."','".$data_loop['TimeId']."','".$data_loop['PropertyId']."','".$data_loop['Property_Name_Th']."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
        // print_r($data_loop);
            die();
        } 
    }
}
echo "Success!!"

?>