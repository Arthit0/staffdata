<?php 
include("connection.php");
// include("helper.php");
ini_set('max_execution_time', 0);
$TRUNCATE = "TRUNCATE oneuat.ditp_stuff_getditpmemberdetails_old_new_all_time";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$TRUNCATES = "TRUNCATE oneuat_dev.ditp_stuff_getditpmemberdetails_old_new_all_time";
if ($mysqlis->query($TRUNCATES) === FALSE ) {
echo "Failed to connect to MySQL: " . $mysqlis->error;
}
$end_date = date('Y-m-d');
$end_date_view = (date('Y',strtotime($end_date))+543).date('m',strtotime($end_date));    
echo 'ditp_stuff_getditpmemberdetails_old_new_all_time\n';
$sql12="SELECT count(DISTINCT aa.CorporateId) as total ,aa.ActivityParticipateStatus FROM ( SELECT     DITPSTuff_DimActivityFactable.* FROM            DITPSTuff_DimActivityFactable INNER JOIN vDimTimeActivity ON DITPSTuff_DimActivityFactable.TimeId = vDimTimeActivity.TimeId WHERE        (vDimTimeActivity.ActivityYearTHAndMonth BETWEEN 253301 AND ".$end_date_view.") AND (DITPSTuff_DimActivityFactable.CorporateId > 0) AND RePropertyName = 'สมาชิกกรม' ) aa GROUP BY aa.ActivityParticipateStatus";
$query_cr2 = sqlsrv_query($conn_ditp, $sql12, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
                $DITP_ONE = "INSERT INTO ditp_stuff_getditpmemberdetails_old_new_all_time (id, total, ActivityParticipateStatus) VALUES (NULL, '".$data_loop['total']."', '".$data_loop['ActivityParticipateStatus']."');";
            // $DITP_ONE = "INSERT INTO `ditpstuff_dimactivities`(`Activity_Id`, `Activity_NameTH`, `Activity_NameEN`, `Department_Name_Th`, `Department_Name_En`, `Activity_DetailTH`, `Activity_DetailEN`, `ActivityPay`, `course_name_th`, `course_subject_name`, `subject_Name`, `Instructor_Name`,
            //         `Activity_TypeNameTH`, `Location_Name_Th`, `Activity_TypeNameNEA`, `ActivityIsClose`, `Country_Name`, `Province_Name`, `Region_Name`, `CalOnSite`, `CalDigital`, `CoreCityName`, `CoreProvinceCode`, `ZoneTH`, `Activity_TypeId`, `ProvinceNameENG`, `NEA_ZoneName`, `ProvinceCode`, `ActivityGroup`,
            //         `MainCourseName`, `ActivityCurrentOrNext`, `Activity_Keyword`, `Country_Code`, `StartDateYear`, `Activity_Start_Date`, `Activity_End_Date`, `EventFormatType`, `Activity_TypeNameTHDrive`)
            //         VALUES ('".$data_loop['Activity_Id']."','".mysql_escape($data_loop['Activity_NameTH'])."','".mysql_escape($data_loop['Activity_NameEN'])."','".$data_loop['Department_Name_Th']."','".$data_loop['Department_Name_En']."','".mysql_escape($data_loop['Activity_DetailTH'])."','".mysql_escape($data_loop['Activity_DetailEN'])."','".$data_loop['ActivityPay']."',
            //         '".$data_loop['course_name_th']."','".$data_loop['course_subject_name']."','".$data_loop['subject_Name']."','".$data_loop['Instructor_Name']."','".$data_loop['Activity_TypeNameTH']."','".$data_loop['Location_Name_Th']."','".$data_loop['Activity_TypeNameNEA']."','".$data_loop['ActivityIsClose']."',
            //         '".$data_loop['Country_Name']."','".$data_loop['Province_Name']."','".$data_loop['Region_Name']."','".$data_loop['CalOnSite']."','".$data_loop['CalDigital']."','".$data_loop['CoreCityName']."','".$data_loop['CoreProvinceCode']."','".$data_loop['ZoneTH']."','".$data_loop['Activity_TypeId']."',
            //         '".$data_loop['ProvinceNameENG']."','".$data_loop['NEA_ZoneName']."','".$data_loop['ProvinceCode']."','".$data_loop['ActivityGroup']."','".$data_loop['MainCourseName']."','".$data_loop['ActivityCurrentOrNext']."','".mysql_escape($data_loop['Activity_Keyword'])."','".$data_loop['Country_Code']."',
            //         '".$data_loop['StartDateYear']."','".date_format($data_loop['Activity_Start_Date'],'Y-m-d H:i:s')."','".date_format($data_loop['Activity_End_Date'],'Y-m-d H:i:s')."','".$data_loop['EventFormatType']."','".$data_loop['Activity_TypeNameTHDrive']."')";
        $rs = $mysqli->query($DITP_ONE);
        if ($rs === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
        // print_r($data_loop);
        }
        if ($mysqlis->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqlis->error;
            die();
       }
    }

}
echo "Success!!\n"

?>