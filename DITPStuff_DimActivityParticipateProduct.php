<?php 
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE DITPStuff_DimActivityParticipateProduct";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }

$SqlServer = "select * from DITPStuff_DimActivityParticipateProduct";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){

        $DITP_ONE = "INSERT INTO `ditpstuff_dimactivityparticipateproduct`( `PId`, `activity_id`, `CorporateId`, `PersonId`, `product_cat_id`, `Product_Cat_Name_Th`, `Product_Cat_Name_En`, `Activity_Id_Journey`) 
                     VALUES ('".$data_loop['PId']."','".$data_loop['activity_id']."','".$data_loop['CorporateId']."','".$data_loop['PersonId']."','".$data_loop['product_cat_id']."','".$data_loop['Product_Cat_Name_Th']."','".$data_loop['Product_Cat_Name_En']."','".$data_loop['Activity_Id_Journey']."')";
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