<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$SqlServer = "select * from DITPONE_DimNEA_OverviewDashboardJourneyNEAProduct";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        print_r($data_loop);
        die();
        
    }
}
echo "<br>";
echo "Success!!";
?>