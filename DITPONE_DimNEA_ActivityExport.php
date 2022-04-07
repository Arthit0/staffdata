<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditp_nea_export_activity";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPONE_DimNEA_ActivityExport";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditp_nea_export_activity`( `ActExpNo`, `ExportNo`, `YearNo`, `Monthno`, `FYear`, `UnCode`, `Quantity`, `ValueBaht`, `ValueUSD`, `ISO_Code`, `CountryNameTH`, `CountryNameEng`, `ZoneTH`, `ZoneEN`,
        `HSCode2`, `HSCode4`, `HSCode6`, `HSCode8`, `HSCode11`, `thdescriptions`, `endescriptions`, `ComCode`, `ShowCode`, `THDescriptions_L1ShowCode`, `THDescriptions_L2ShowCode`, `THDescriptions_L3ShowCode`, 
        `THDescriptions_L4ShowCode`, `THDescriptions_L5ShowCode`, `Tax_No`, `CorporateId`, `Person_No`, `PersonId`, `Activity_Id`, `ComSize_Capital`, `ComSizeBySME`, `ComSize`, `TimeNO`, `ProvinceCode`, `calValueBaht`,
         `calValueUSD`, `calQuantity`, `RankActivity`, `RankMainCourse`, `RankDITPActivity`, `ExportCount`, `NEAActivityToDITP`) VALUES 
       ('".mysql_escape($data_loop['ActExpNo'])."','".mysql_escape($data_loop['ExportNo'])."','".mysql_escape($data_loop['YearNo'])."','".mysql_escape($data_loop['Monthno'])."','".mysql_escape($data_loop['FYear'])."',
       '".mysql_escape($data_loop['UnCode'])."','".mysql_escape($data_loop['Quantity'])."','".mysql_escape($data_loop['ValueBaht'])."','".mysql_escape($data_loop['ValueUSD'])."','".mysql_escape($data_loop['ISO_Code'])."',
       '".mysql_escape($data_loop['CountryNameTH'])."','".mysql_escape($data_loop['CountryNameEng'])."','".mysql_escape($data_loop['ZoneTH'])."','".mysql_escape($data_loop['ZoneEN'])."','".mysql_escape($data_loop['HSCode2'])."',
       '".mysql_escape($data_loop['HSCode4'])."','".mysql_escape($data_loop['HSCode6'])."','".mysql_escape($data_loop['HSCode8'])."','".mysql_escape($data_loop['HSCode11'])."','".mysql_escape($data_loop['thdescriptions'])."',
       '".mysql_escape($data_loop['endescriptions'])."','".$data_loop['ComCode']."','".mysql_escape($data_loop['ShowCode'])."','".mysql_escape($data_loop['THDescriptions_L1ShowCode'])."','".mysql_escape($data_loop['THDescriptions_L2ShowCode'])."',
       '".mysql_escape($data_loop['THDescriptions_L3ShowCode'])."','".mysql_escape($data_loop['THDescriptions_L4ShowCode'])."','".mysql_escape($data_loop['THDescriptions_L5ShowCode'])."','".mysql_escape($data_loop['Tax_No'])."','".mysql_escape($data_loop['CorporateId'])."',
       '".mysql_escape($data_loop['Person_No'])."','".mysql_escape($data_loop['PersonId'])."','".mysql_escape($data_loop['Activity_Id'])."','".mysql_escape($data_loop['ComSize_Capital'])."','".mysql_escape($data_loop['ComSizeBySME'])."',
       '".mysql_escape($data_loop['ComSize'])."','".mysql_escape($data_loop['TimeNO'])."','".mysql_escape($data_loop['ProvinceCode'])."','".mysql_escape($data_loop['calValueBaht'])."','".mysql_escape($data_loop['calValueUSD'])."',
       '".mysql_escape($data_loop['calQuantity'])."','".mysql_escape($data_loop['RankActivity'])."','".mysql_escape($data_loop['RankMainCourse'])."','".mysql_escape($data_loop['RankDITPActivity'])."','".mysql_escape($data_loop['ExportCount'])."',
       '".mysql_escape($data_loop['NEAActivityToDITP'])."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>