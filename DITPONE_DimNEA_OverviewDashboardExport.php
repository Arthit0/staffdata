<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);

$TRUNCATE = "TRUNCATE oneuat.DITPONE_DimNEA_OverviewDashboardExport";
$TRUNCATES = "TRUNCATE oneuat_dev.DITPONE_DimNEA_OverviewDashboardExport";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
    if ($mysqlis->query($TRUNCATES) === FALSE ) {
        echo "Failed to connect to MySQL: " . $mysqlis->error;
    }
$SqlServer = "select * from DITPONE_DimNEA_OverviewDashboardExport";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimnea_overviewdashboardexport`(`YearNo`, `FYearTH`, `ComSize`, `ValueBaht`, `ParticipateTotel`) 
        VALUES ('".$data_loop['YearNo']."','".$data_loop['FYearTH']."','".$data_loop['ComSize']."','".$data_loop['ValueBaht']."','".$data_loop['ParticipateTotel']."')";
       print_r($DITP_ONE);
       if ($mysqli->query($DITP_ONE) === FALSE ) {
           echo "Failed to connect to MySQL: " . $mysqli->error;
           die();
       }
       if ($mysqlis->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqlis->error;
            die();
      } 
    }
}
echo "<br>";
echo "Success!!";
?>