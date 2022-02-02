<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpone_dimnea_participate";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
$SqlServer = "select * from DITPONE_DimNEA_Participate";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimnea_participate`(`PId`, `NEAActivity_Id`, `NEAPersonId`, `NEACorporateId`, `ProvinceName`, `RegionName`, `CardNo`, `ParticipateName`, `ParticipateName_TH`, `ProvinceNameTH`, `TaxNo`,
        `Corporate_NameTH`, `Activity_TypeNameNEA`, `StartDateFYear`, `RankActivity`, `RankMainCourse`, `RankCourseName`, `RankDITPActivity`, `ExportCount`, `ValueBaht`, `calValueBaht`, `ActivityCorporateCheckParticipate`,
         `ActivityCorporateCheckExport`, `ActivityPersonCheckParticipate`, `ActivityPersonCheckExport`, `Person_No`, `Person_NameTH`) VALUES 
       ('".mysql_escape($data_loop['PId'])."','".mysql_escape($data_loop['NEAActivity_Id'])."','".mysql_escape($data_loop['NEAPersonId'])."','".mysql_escape($data_loop['NEACorporateId'])."','".mysql_escape($data_loop['ProvinceName'])."',
       '".mysql_escape($data_loop['RegionName'])."','".mysql_escape($data_loop['CardNo'])."','".mysql_escape($data_loop['ParticipateName'])."','".mysql_escape($data_loop['ParticipateName_TH'])."','".mysql_escape($data_loop['ProvinceNameTH'])."',
       '".mysql_escape($data_loop['TaxNo'])."','".mysql_escape($data_loop['Corporate_NameTH'])."','".mysql_escape($data_loop['Activity_TypeNameNEA'])."','".mysql_escape($data_loop['StartDateFYear'])."','".mysql_escape($data_loop['RankActivity'])."',
       '".mysql_escape($data_loop['RankMainCourse'])."','".mysql_escape($data_loop['RankCourseName'])."','".mysql_escape($data_loop['RankDITPActivity'])."','".mysql_escape($data_loop['ExportCount'])."','".mysql_escape($data_loop['ValueBaht'])."',
       '".mysql_escape($data_loop['calValueBaht'])."','".mysql_escape($data_loop['ActivityCorporateCheckParticipate'])."','".mysql_escape($data_loop['ActivityCorporateCheckExport'])."','".mysql_escape($data_loop['ActivityPersonCheckParticipate'])."',
       '".mysql_escape($data_loop['ActivityPersonCheckExport'])."','".mysql_escape($data_loop['Person_No'])."','".mysql_escape($data_loop['Person_NameTH'])."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>