<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE DITPONE_DimNEA_OverviewDashboardElearningRegion";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
$SqlServer = "select * from DITPONE_DimNEA_OverviewDashboardElearningRegion";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimnea_overviewdashboardelearningregion`(`No`, `Region_Name_Th`, `StartDateFYear`, `CalValue`, `CalPercented`) 
        VALUES ('".$data_loop['No']."','".$data_loop['Region_Name_Th']."','".$data_loop['StartDateFYear']."','".$data_loop['CalValue']."','".$data_loop['CalPercented']."')";
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