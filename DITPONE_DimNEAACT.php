<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditpone_dimneaact";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPONE_DimNEAACT";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        
        $DITP_ONE = "INSERT INTO `ditpone_dimneaact`(`Activity_Id`, `Activity_NameTH`, `Activity_NameEN`, `Created_Date`, `CreatedDay`, `CreatedMonth`, `CreatedQUARTER`, `CreatedYear`, `CreatedFYear`, `Activity_Start_Regis`, 
        `StartRegisDateDay`, `StartRegisDateMonth`, `StartRegisDateQUARTER`, `StartRegisDateYear`, `StartRegisDateFYear`, `Activity_Start_Date`, `StartDateDay`, `StartDateMonth`, `StartDateQUARTER`, `StartDateYear`, 
        `StartDateFYear`, `Activity_End_Date`, `EndDateDay`, `EndDateMonth`, `EndDateQUARTER`, `EndDateYear`, `EndDateFYear`, `Department_Name_Th`, `Department_Name_En`, `Activity_DetailTH`, `Activity_DetailEN`, 
        `ActivityPay`, `course_name_th`, `course_subject_name`, `subject_Name`, `Instructor_Name`, `Activity_TypeNameTH`, `Location_Name_Th`, `Activity_TypeNameNEA`, `ActivityIsClose`, `Country_Name`, `Province_Name`,
         `Region_Name`, `CalOnSite`, `CalDigital`, `CoreCityName`, `CoreProvinceCode`, `ZoneTH`, `Activity_TypeId`, `Latitude`, `Longitude`, `ProvinceNameENG`, `NEA_ZoneName`, `MainCourseName`, `ProvinceCode`, `TimeNO`) VALUES 
        ('".mysql_escape($data_loop['Activity_Id'])."','".mysql_escape($data_loop['Activity_NameTH'])."','".mysql_escape($data_loop['Activity_NameEN'])."','".date_format($data_loop['Created_Date'],'Y-m-d H:i:s')."','".mysql_escape($data_loop['CreatedDay'])."',
        '".mysql_escape($data_loop['CreatedMonth'])."','".mysql_escape($data_loop['CreatedQUARTER'])."','".mysql_escape($data_loop['CreatedYear'])."','".mysql_escape($data_loop['CreatedFYear'])."','".date_format($data_loop['Activity_Start_Regis'],'Y-m-d H:i:s')."',
        '".mysql_escape($data_loop['StartRegisDateDay'])."','".mysql_escape($data_loop['StartRegisDateMonth'])."','".mysql_escape($data_loop['StartRegisDateQUARTER'])."','".mysql_escape($data_loop['StartRegisDateYear'])."','".mysql_escape($data_loop['StartRegisDateFYear'])."',
        '".date_format($data_loop['Activity_Start_Date'],'Y-m-d H:i:s')."','".mysql_escape($data_loop['StartDateDay'])."','".mysql_escape($data_loop['StartDateMonth'])."','".mysql_escape($data_loop['StartDateQUARTER'])."','".mysql_escape($data_loop['StartDateYear'])."',
        '".mysql_escape($data_loop['StartDateFYear'])."','".date_format($data_loop['Activity_End_Date'],'Y-m-d H:i:s')."','".mysql_escape($data_loop['EndDateDay'])."','".mysql_escape($data_loop['EndDateMonth'])."','".mysql_escape($data_loop['EndDateQUARTER'])."',
        '".mysql_escape($data_loop['EndDateYear'])."','".mysql_escape($data_loop['EndDateFYear'])."','".mysql_escape($data_loop['Department_Name_Th'])."','".mysql_escape($data_loop['Department_Name_En'])."','".mysql_escape($data_loop['Activity_DetailTH'])."',
        '".mysql_escape($data_loop['Activity_DetailEN'])."','".mysql_escape($data_loop['ActivityPay'])."','".mysql_escape($data_loop['course_name_th'])."','".mysql_escape($data_loop['course_subject_name'])."','".mysql_escape($data_loop['subject_Name'])."',
        '".mysql_escape($data_loop['Instructor_Name'])."','".mysql_escape($data_loop['Activity_TypeNameTH'])."','".mysql_escape($data_loop['Location_Name_Th'])."','".mysql_escape($data_loop['Activity_TypeNameNEA'])."','".mysql_escape($data_loop['ActivityIsClose'])."',
        '".mysql_escape($data_loop['Country_Name'])."','".mysql_escape($data_loop['Province_Name'])."','".mysql_escape($data_loop['Region_Name'])."','".mysql_escape($data_loop['CalOnSite'])."','".mysql_escape($data_loop['CalDigital'])."',
        '".mysql_escape($data_loop['CoreCityName'])."','".mysql_escape($data_loop['CoreProvinceCode'])."','".mysql_escape($data_loop['ZoneTH'])."','".mysql_escape($data_loop['Activity_TypeId'])."','".mysql_escape($data_loop['Latitude'])."',
        '".mysql_escape($data_loop['Longitude'])."','".mysql_escape($data_loop['ProvinceNameENG'])."','".mysql_escape($data_loop['NEA_ZoneName'])."','".mysql_escape($data_loop['MainCourseName'])."','".mysql_escape($data_loop['ProvinceCode'])."',
        '".mysql_escape($data_loop['TimeNO'])."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>