<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
// $TRUNCATE = "TRUNCATE ditpone_dimneaparticipate_comp";
//     if ($mysqli->query($TRUNCATE) === FALSE ) {
//     echo "Failed to connect to MySQL: " . $mysqli->error;
//     }  
$SqlServer = "select * from DITPONE_DimNEAParticipate_Comp";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimneaparticipate_comp`(`CorporateId`, `Tax_No`, `Corporate_NameTH`, `Corporate_NameEN`, `Registered_Capital`, `ComSize_Capital`, `ComSizeBySME`, `ComSize`, `ProvinceCode`, `ProvinceName`, 
        `Region_Name_Th`, `Address_No_TH`, `DistrictCode`, `DistrictName`, `SubDistrictCode`, `SubDistrictName`, `Telephone`, `email`, `DBD_ObjectDetail`, `DBD_juristicAddress`, `DBD_juristicSubDistrict`, `DBD_juristicDistrict`, 
        `DBD_juristicProvince`, `DBD_juristicType`, `DBD_juristicStatus`, `ThaiCorporate`, `DBDRegister`, `PMAwardMember`, `ThaiSelectMember`, `TMarkMember`, `TalentThaiMember`, `QuratedAwardMember`, `SMEMember`, `DMarkMember`, 
        `ActivityCorporateCheckParticipate`, `ActivityCorporateCheckExport`, `Export_ValueBahtCurrentYear`, `Property_Name_Th`) VALUES 
        ('".mysql_escape($data_loop['CorporateId'])."','".mysql_escape($data_loop['Tax_No'])."','".mysql_escape($data_loop['Corporate_NameTH'])."','".mysql_escape($data_loop['Corporate_NameEN'])."','".mysql_escape($data_loop['Registered_Capital'])."','".mysql_escape($data_loop['ComSize_Capital'])."',
        '".mysql_escape($data_loop['ComSizeBySME'])."','".mysql_escape($data_loop['ComSize'])."','".mysql_escape($data_loop['ProvinceCode'])."','".mysql_escape($data_loop['ProvinceName'])."','".mysql_escape($data_loop['Region_Name_Th'])."','".mysql_escape($data_loop['Address_No_TH'])."',
        '".mysql_escape($data_loop['DistrictCode'])."','".mysql_escape($data_loop['DistrictName'])."','".mysql_escape($data_loop['SubDistrictCode'])."','".mysql_escape($data_loop['SubDistrictName'])."','".mysql_escape($data_loop['Telephone'])."','".mysql_escape($data_loop['email'])."',
        '".mysql_escape($data_loop['DBD_ObjectDetail'])."','".mysql_escape($data_loop['DBD_juristicAddress'])."','".mysql_escape($data_loop['DBD_juristicSubDistrict'])."','".mysql_escape($data_loop['DBD_juristicDistrict'])."','".mysql_escape($data_loop['DBD_juristicProvince'])."','".mysql_escape($data_loop['DBD_juristicType'])."',
        '".mysql_escape($data_loop['DBD_juristicStatus'])."','".mysql_escape($data_loop['ThaiCorporate'])."','".mysql_escape($data_loop['DBDRegister'])."','".mysql_escape($data_loop['PMAwardMember'])."','".mysql_escape($data_loop['ThaiSelectMember'])."','".mysql_escape($data_loop['TMarkMember'])."',
        '".mysql_escape($data_loop['TalentThaiMember'])."','".mysql_escape($data_loop['QuratedAwardMember'])."','".mysql_escape($data_loop['SMEMember'])."','".mysql_escape($data_loop['DMarkMember'])."','".mysql_escape($data_loop['ActivityCorporateCheckParticipate'])."','".mysql_escape($data_loop['ActivityCorporateCheckExport'])."',
        '".mysql_escape($data_loop['Export_ValueBahtCurrentYear'])."','".mysql_escape($data_loop['Property_Name_Th'])."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>