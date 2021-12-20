<?php 
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpstuff_dataparticipateforpotential";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPStuff_DataParticipateForPotential";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){

        $DITP_ONE = "INSERT INTO `ditpstuff_dataparticipateforpotential`(`RowNo`, `Activity_id`, `FYear`, `YearNo`, `MonthNo`, `ComSizeBySME`, `ComSize`, `ActivityCorporateCheckParticipate`, `ActivityCorporateCheckExport`, `ProvinceName`, `Region_Name_Th`, `ParticipateType`, `SourceType`, `EventFormatType`, `ActivityIsClose`, `YearAndMonth`, `CorporateId`, `Tax_No`, `ValueBaht`, `PropertyNameTh`, `DifferenceYear`, `PropertyNameThOTher`, `InCurrentYear`, `IsThai`) 
        VALUES ('".$data_loop['RowNo']."','".$data_loop['Activity_id']."','".$data_loop['FYear']."','".$data_loop['YearNo']."','".$data_loop['MonthNo']."','".$data_loop['ComSizeBySME']."','".$data_loop['ComSize']."','".$data_loop['ActivityCorporateCheckParticipate']."','".$data_loop['ActivityCorporateCheckExport']."','".$data_loop['ProvinceName']."','".$data_loop['Region_Name_Th']."','".$data_loop['ParticipateType']."','".$data_loop['SourceType']."','".$data_loop['EventFormatType']."','".$data_loop['ActivityIsClose']."','".$data_loop['YearAndMonth']."','".$data_loop['CorporateId']."','".$data_loop['Tax_No']."','".$data_loop['ValueBaht']."','".$data_loop['PropertyNameTh']."','".$data_loop['DifferenceYear']."','".$data_loop['PropertyNameThOTher']."','".$data_loop['InCurrentYear']."','".$data_loop['IsThai']."')";
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