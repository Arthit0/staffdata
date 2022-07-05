<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpone_dimnea_overviewdashboardreport";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
$SqlServer = "select * from DITPONE_DimNEA_OverviewDashboardReport";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static')); 
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimnea_overviewdashboardreport`(`StartDateFYear`, `ParticipateCount`, `NEAActivityCount`, `PersonAndCorporate`, `NEACorporateCount`, `NEAPersonCount`) 
        VALUES ('".$data_loop['StartDateFYear']."','".$data_loop['ParticipateCount']."','".$data_loop['NEAActivityCount']."','".$data_loop['PersonAndCorporate']."','".$data_loop['NEACorporateCount']."','".$data_loop['NEAPersonCount']."')";
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