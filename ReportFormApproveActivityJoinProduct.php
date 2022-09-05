<?php
include("connection_SME.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE reportformapproveactivityjoinproduct";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from ReportFormApproveActivityJoinProduct";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
            //   print_r($data_loop);
            //   die();
            //   [Activity_Form_Id] => 1
            //   [ProductGroup_Id] => 5
            //   [ProductGroup_Name] => สินค้าไลฟ์สไตล์
            //   [ProductCategory_Id] => 11
            //   [ProductName] => Gifts and Decorative Items / Handicrafts
            //   [Product_Detail] 
            
            $DITP_ONE = "INSERT INTO `reportformapproveactivityjoinproduct`
            ( `Activity_Form_Id`, `ProductGroup_Id`, `ProductGroup_Name`, 
            `ProductCategory_Id`, `ProductName`, `Product_Detail`) VALUES 
            ('".$data_loop['Activity_Form_Id']."','".$data_loop['ProductGroup_Id']."',
            '".mysql_escape($data_loop['ProductGroup_Name'])."','".$data_loop['ProductCategory_Id']."',
            '".mysql_escape($data_loop['ProductName'])."','".mysql_escape($data_loop['Product_Detail'])."')";
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