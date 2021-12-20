<?php 
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpstuff_dimactivitymemberproperty";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }

$SqlServer = "select * from DITPStuff_DimActivityMemberProperty";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        
        $DITP_ONE = "INSERT INTO `ditpstuff_dimactivitymemberproperty`(`Nrow`, `MemberType`, `CountTaxno`, `SourceTaxno`, `RatioOfCom`, `RatioOfComParticipate`, `InCurrentYear`) 
        VALUES ('".$data_loop['Nrow']."','".$data_loop['MemberType']."','".$data_loop['CountTaxno']."','".$data_loop['SourceTaxno']."','".$data_loop['RatioOfCom']."','".$data_loop['RatioOfComParticipate']."','".$data_loop['InCurrentYear']."')";
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