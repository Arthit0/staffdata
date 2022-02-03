<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpone_dimneaparticipate_person";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }  
$SqlServer = "select * from ditpone_dimneaparticipate_person";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimneaparticipate_person`(`PersonId`, `Person_No`, `Person_NameTH`, `Person_NameEN`, `ProvinceCode`, `ProvinceName`,
        `Region_Name_Th`, `Address_No_TH`, `DistrictCode`, `DistrictName`, `SubDistrictCode`, `SubDistrictName`, `Telephone`, `email`, `IsThai`, 
        `Property_Name_Th`, `ActivityCorporateCheckParticipate`) VALUES 
       ('".mysql_escape($data_loop['PersonId'])."','".mysql_escape($data_loop['Person_No'])."','".mysql_escape($data_loop['Person_NameTH'])."',
       '".mysql_escape($data_loop['Person_NameEN'])."','".mysql_escape($data_loop['ProvinceCode'])."','".mysql_escape($data_loop['ProvinceName'])."',
       '".mysql_escape($data_loop['Region_Name_Th'])."','".mysql_escape($data_loop['Address_No_TH'])."','".mysql_escape($data_loop['DistrictCode'])."',
       '".mysql_escape($data_loop['DistrictName'])."','".mysql_escape($data_loop['SubDistrictCode'])."','".mysql_escape($data_loop['SubDistrictName'])."',
       '".mysql_escape($data_loop['Telephone'])."','".mysql_escape($data_loop['email'])."','".mysql_escape($data_loop['IsThai'])."',
       '".mysql_escape($data_loop['Property_Name_Th'])."','".mysql_escape($data_loop['ActivityCorporateCheckParticipate'])."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>