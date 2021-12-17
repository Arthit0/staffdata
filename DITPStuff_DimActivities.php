<?php 
include('connection.php');
$sql12="select * from DITPStuff_DimActivities";
$query_cr2 = sqlsrv_query($conn, $sql12, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        print_r($data_loop);
        die();
        
    }

}


?>