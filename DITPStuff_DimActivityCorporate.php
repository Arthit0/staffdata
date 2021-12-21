<?php 
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpstuff_dimactivitycorporate";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }

$SqlServer = "select * from DITPStuff_DimActivityCorporate";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){

        $DITP_ONE = "INSERT INTO `ditpstuff_dimactivitycorporate`(`CorporateId`, `TaxNo`, `ComSize`, `ComSizeBySME`, `ActivityParticipateStatus`, `NewExportStatus`, `ProvinceCode`, `ProvinceName`,
                    `RegionNameTh`, `DistrictName`, `SubDistrictName`, `Telephone`, `email`, `DBDCapitalValue`, `DBDComSizeCapital`, `DBDObjectDetail`, `DBDJuristicAddress`, `DBDJuristicSubDistrict`, `DBDJuristicDistrict`,
                    `DBDJuristicProvince`, `DBDJuristicType`, `DBDJuristicStatus`, `ThaiCorporate`, `DBDRegister`, `ThaitradeMember`, `PMAwardMember`, `ThaiSelectMember`, `TMarkMember`, `TalentThaiMember`, `QuratedAwardMember`, `SMEMember`,
                    `DMarkMember`, `PropertyName`, `DBD_TotalAssets`, `DBD_TotalAssetsSize`, `DBD_StatementYear`, `ComSize100`, `DBD_TotalAssetsSize100`, `DBDComSizeCapital100`) 
                    VALUES ('".$data_loop['CorporateId']."','".$data_loop['TaxNo']."','".$data_loop['ComSize']."','".$data_loop['ComSizeBySME']."','".$data_loop['ActivityParticipateStatus']."','".$data_loop['NewExportStatus']."','".$data_loop['ProvinceCode']."','".$data_loop['ProvinceName']."',
                    '".$data_loop['RegionNameTh']."','".mysql_escape($data_loop['DistrictName'])."','".$data_loop['SubDistrictName']."','".str_replace("'+66","0",$data_loop['Telephone'])."','".$data_loop['email']."','".$data_loop['DBDCapitalValue']."','".$data_loop['DBDComSizeCapital']."','".$data_loop['DBDObjectDetail']."','".$data_loop['DBDJuristicAddress']."','".$data_loop['DBDJuristicSubDistrict']."','".$data_loop['DBDJuristicDistrict']."',
                    '".$data_loop['DBDJuristicProvince']."','".$data_loop['DBDJuristicType']."','".$data_loop['DBDJuristicStatus']."','".$data_loop['ThaiCorporate']."','".$data_loop['DBDRegister']."','".$data_loop['ThaitradeMember']."','".$data_loop['PMAwardMember']."','".$data_loop['ThaiSelectMember']."','".$data_loop['TMarkMember']."','".$data_loop['TalentThaiMember']."','".$data_loop['QuratedAwardMember']."','".$data_loop['SMEMember']."',
                    '".$data_loop['DMarkMember']."','".$data_loop['PropertyName']."','".$data_loop['DBD_TotalAssets']."','".$data_loop['DBD_TotalAssetsSize']."','".$data_loop['DBD_StatementYear']."','".$data_loop['ComSize100']."','".$data_loop['DBD_TotalAssetsSize100']."','".$data_loop['DBDComSizeCapital100']."')";
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