<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpone_dimditp_act";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPONE_DimDITP_ACT";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpone_dimditp_act`(`Activity_Id`, `Activity_NameTH`, `Activity_NameEN`, `Created_Date`, `CreatedDay`, `CreatedMonth`, `CreatedQUARTER`, `CreatedYear`, `CreatedFYear`, `Activity_Start_Regis`, `StartRegisDateDay`, `StartRegisDateMonth`, 
        `StartRegisDateQUARTER`, `StartRegisDateYear`, `StartRegisDateFYear`, `Activity_Start_Date`, `StartDateDay`, `StartDateMonth`, `StartDateQUARTER`, `StartDateYear`, `StartDateFYear`, `Activity_End_Date`, `EndDateDay`, `EndDateMonth`, 
        `EndDateQUARTER`, `EndDateYear`, `EndDateFYear`, `Department_Name_Th`, `Department_Name_En`, `Activity_DetailTH`, `Activity_DetailEN`, `ActivityPay`, `course_name_th`, `course_subject_name`, `subject_Name`, `Instructor_Name`,
         `Activity_TypeNameTH`, `Location_Name_Th`, `Activity_TypeNameNEA`, `ActivityIsClose`, `Country_Name`, `Province_Name`, `Region_Name`, `CalOnSite`, `CalOnSiteName`, `CalDigital`, `CalDigitalName`, `CoreCityName`,
         `CoreProvinceCode`, `ZoneTH`, `Activity_TypeId`, `Latitude`, `Longitude`, `ProvinceNameENG`, `MainCourseName`, `NEA_ZoneName`, `ProvinceCode`, `TimeNO`) VALUES 
        ('".mysql_escape($data_loop['Activity_Id'])."','".mysql_escape($data_loop['Activity_NameTH'])."','".mysql_escape($data_loop['Activity_NameEN'])."','".date_format($data_loop['Created_Date'],'Y-m-d H:i:s')."','".$data_loop['CreatedDay']."','".$data_loop['CreatedMonth']."','".$data_loop['CreatedQUARTER']."',
        '".$data_loop['CreatedYear']."','".$data_loop['CreatedFYear']."','".date_format($data_loop['Activity_Start_Regis'],'Y-m-d H:i:s')."','".$data_loop['StartRegisDateDay']."','".$data_loop['StartRegisDateMonth']."','".$data_loop['StartRegisDateQUARTER']."',
        '".$data_loop['StartRegisDateYear']."','".$data_loop['StartRegisDateFYear']."','".date_format($data_loop['Activity_Start_Date'],'Y-m-d H:i:s')."','".$data_loop['StartDateDay']."','".$data_loop['StartDateMonth']."','".$data_loop['StartDateQUARTER']."',
        '".$data_loop['StartDateYear']."','".$data_loop['StartDateFYear']."','".date_format($data_loop['Activity_End_Date'],'Y-m-d H:i:s')."','".$data_loop['EndDateDay']."','".$data_loop['EndDateMonth']."','".$data_loop['EndDateQUARTER']."','".$data_loop['EndDateYear']."',
        '".$data_loop['EndDateFYear']."','".mysql_escape($data_loop['Department_Name_Th'])."','".mysql_escape($data_loop['Department_Name_En'])."','".mysql_escape($data_loop['Activity_DetailTH'])."','".mysql_escape($data_loop['Activity_DetailEN'])."','".$data_loop['ActivityPay']."','".$data_loop['course_name_th']."',
        '".mysql_escape($data_loop['course_subject_name'])."','".mysql_escape($data_loop['subject_Name'])."','".$data_loop['Instructor_Name']."','".$data_loop['Activity_TypeNameTH']."','".$data_loop['Location_Name_Th']."','".$data_loop['Activity_TypeNameNEA']."','".$data_loop['ActivityIsClose']."',
        '".mysql_escape($data_loop['Country_Name'])."','".mysql_escape($data_loop['Province_Name'])."','".mysql_escape($data_loop['Region_Name'])."','".$data_loop['CalOnSite']."','".$data_loop['CalOnSiteName']."','".$data_loop['CalDigital']."','".$data_loop['CalDigitalName']."','".mysql_escape($data_loop['CoreCityName'])."',
        '".$data_loop['CoreProvinceCode']."','".$data_loop['ZoneTH']."','".$data_loop['Activity_TypeId']."','".$data_loop['Latitude']."','".$data_loop['Longitude']."','".mysql_escape($data_loop['ProvinceNameENG'])."','".mysql_escape($data_loop['MainCourseName'])."','".mysql_escape($data_loop['NEA_ZoneName'])."',
        '".$data_loop['ProvinceCode']."','".$data_loop['TimeNO']."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>