<?php
include("connect_pdpa.php");
include("helper.php");
ini_set("max_execution_time",0);

// $SqlServer = "SELECT * FROM Person WHERE RefUid = 1220600045353";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(1);
//     }
// } 
// $SqlServer = "SELECT * FROM ConsentVersionData WHERE CvId = 46";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
// $SqlServer = "SELECT * FROM Consent WHERE ConsId = 2";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
// $SqlServer = "SELECT * FROM PersonOption WHERE PersonId = 160";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
// $SqlServer = "SELECT * FROM ConsentOption WHERE ConsOptId = 5";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
// $SqlServer = "SELECT * FROM SiteConsent WHERE SiteId = 5 and ConsId = 2";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
$SqlServer = "SELECT * FROM SiteConsentOption WHERE ScId = 3 and  ConsOptId = 7";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
       print_r($data_loop);
       print_r(2);
    }
}
echo "<br>";
echo "Success!!";
?>