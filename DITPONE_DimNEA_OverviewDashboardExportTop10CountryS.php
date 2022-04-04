<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE DITPONE_DimNEA_OverviewDashboardExport";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
$SqlServer = "select * from DITPONE_DimNEA_OverviewDashboardExportTop10CountryS";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimnea_overviewdashboardexporttop10countrys`(`YearNo`, `FYearTH`, `ISO_Code`, `CountryName`, `ComSize`, `ParticipateTotal`) 
        VALUES ('".$data_loop['YearNo']."','".$data_loop['FYearTH']."','".$data_loop['ISO_Code']."','".$data_loop['CountryName']."','".$data_loop['ComSize']."','".$data_loop['ParticipateTotal']."')";
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