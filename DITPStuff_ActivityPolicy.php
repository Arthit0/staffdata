<?php
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE DITPStuff_ActivityPolicy";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPStuff_ActivityPolicy";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpstuff_activitypolicy`(`PolicyRowNo`, `Activity_id`, `Policy_id`, `Policy_Name`) VALUES ('".$data_loop['PolicyRowNo']."','".$data_loop['Activity_id']."','".$data_loop['Policy_id']."','".$data_loop['Policy_Name']."')";
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