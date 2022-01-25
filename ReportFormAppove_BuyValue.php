<?php 
include("connection_SME.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE reportformapprove_buyvalue";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from ReportFormApprove_BuyValue";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  

if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){

        $DITP_ONE = "INSERT INTO `reportformapprove_buyvalue`( `Activity_Assessment_Detail_Id`, `Activity_Form_Id`, `Product_type`, `OrderNowUSD`, `OrderYearUSD`, `Country`) 
        VALUES ('".$data_loop['Activity_Assessment_Detail_Id']."','".$data_loop['Activity_Form_Id']."','".$data_loop['ประเภทสินค้าFreeText']."','".$data_loop['มูลค่าสั่งซื้อทันที่USD']."',
        '".$data_loop['มูลค่าสั่งซื้อคาดการณ์ใน1ปีUSD']."','".$data_loop['ประเทศที่สั่งซื้อ']."')";
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