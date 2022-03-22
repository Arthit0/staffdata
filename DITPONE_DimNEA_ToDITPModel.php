<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpone_dimnea_toditpmodel";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
$SqlServer = "select * from DITPONE_DimNEA_ToDITPModel";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
       $DITP_ONE = "INSERT INTO `ditpone_dimnea_toditpmodel`(`MNo`, `NEAActivity_Id`, `NEAPersonId`, `NEACorporateId`, `Activity_Id`, `PersonId`, `CorporateId`, `Province_Name`, `TimeNO`, `ActType`, `Department_Name_Th`) 
       VALUES ('".mysql_escape($data_loop['MNo'])."','".mysql_escape($data_loop['NEAActivity_Id'])."','".mysql_escape($data_loop['NEAPersonId'])."','".mysql_escape($data_loop['NEACorporateId'])."',
       '".mysql_escape($data_loop['Activity_Id'])."','".mysql_escape($data_loop['PersonId'])."','".mysql_escape($data_loop['CorporateId'])."','".mysql_escape($data_loop['Province_Name'])."',
       '".mysql_escape($data_loop['TimeNO'])."','".mysql_escape($data_loop['ActType'])."','".mysql_escape($data_loop['Department_Name_Th'])."')";
       print_r($DITP_ONE);
       if ($mysqli->query($DITP_ONE) === FALSE ) {
           echo "Failed to connect to MySQL: " . $mysqli->error;
           die();
       } 
    }
}
echo "<br>";
echo "Success!!";
?>