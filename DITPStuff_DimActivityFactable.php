<?php 
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpstuff_dimactivityfactable";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }

$SqlServer = "select * from DITPStuff_DimActivityFactable where Year >= 2018";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        
        $DITP_ONE = "INSERT INTO `ditpstuff_dimactivityfactable`(`ActParticipateExpNo`, `Activity_id`, `CorporateId`, `PersonId`, `Activity_id_Journey`, `TimeId`, `ActivityParticipateTypeNo`, `Participate_id`, `ParticipateProvinceCode`, `ActivityProvinceCode`, `ActivityParticipateStatus`, `NewExportStatus`, `ParticipateTypeName`, `PropertyName`, `ComCode`, `HSCodeNo`, `CountryNo`, `Year`, `ComSize`, `RePropertyName`) 
                    VALUES ('".$data_loop['ActParticipateExpNo']."','".$data_loop['Activity_id']."','".$data_loop['CorporateId']."','".$data_loop['PersonId']."','".$data_loop['Activity_id_Journey']."','".$data_loop['TimeId']."','".$data_loop['ActivityParticipateTypeNo']."','".$data_loop['Participate_id']."','".$data_loop['ParticipateProvinceCode']."','".$data_loop['ActivityProvinceCode']."','".$data_loop['ActivityParticipateStatus']."',
                    '".$data_loop['NewExportStatus']."','".$data_loop['ParticipateTypeName']."','".$data_loop['PropertyName']."','".$data_loop['ComCode']."','".$data_loop['HSCodeNo']."','".$data_loop['CountryNo']."','".$data_loop['Year']."','".$data_loop['ComSize']."','".$data_loop['RePropertyName']."')";
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