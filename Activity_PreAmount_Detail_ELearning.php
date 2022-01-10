<?php
include("connection.php");
include("helper.php");
ini_set("max_execution_time",0);
// $TRUNCATE = "TRUNCATE ditpstuff_activity_preamount_detail_elearning";
//     if ($mysqli->query($TRUNCATE) === FALSE ) {
//     echo "Failed to connect to MySQL: " . $mysqli->error;
//     }
$SqlServer = "select * from Activity_PreAmount_Detail_ELearning";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = " INSERT INTO `ditpstuff_activity_preamount_detail_elearning`(`Activity_id`, `Activity_id_New`, `Activity_NameTH`, `Activity_NameEN`, `Activity_TypeNameTH`, `ParticipateCount`, `IsProgress`, `Country_Code`, `Country_Name`, `Province_Code`, `Province_Name`, `Region_Name`, `ParticipateCorporate`, `ParticipatePerson`, `Month`, `Year`, `Policy`, `Department`, `APay`, `course_name_th`, `course_subject_name`, `subject_namem`, `Location_Name_Th`, `Activity_Start_Date`, `Activity_End_Date`)
        VALUES ('".$data_loop['Activity_id']."','".$data_loop['Activity_id_New']."','".mysql_escape($data_loop['Activity_NameTH'])."','".mysql_escape($data_loop['Activity_NameEN'])."','".$data_loop['Activity_TypeNameTH']."','".$data_loop['ParticipateCount']."','".$data_loop['IsProgress']."','".$data_loop['Country_Code']."','".$data_loop['Country_Name']."','".$data_loop['Province_Code']."','".$data_loop['Province_Name']."',
        '".$data_loop['Region_Name']."','".$data_loop['ParticipateCorporate']."','".$data_loop['ParticipatePerson']."','".$data_loop['Month']."','".$data_loop['Year']."','".$data_loop['Policy']."','".$data_loop['Department']."','".$data_loop['APay']."','".mysql_escape($data_loop['course_name_th'])."','".$data_loop['course_subject_name']."','".$data_loop['subject_namem']."','".$data_loop['Location_Name_Th']."','".date_format($data_loop['Activity_Start_Date'],'Y-m-d H:i:s')."','".date_format($data_loop['Activity_End_Date'],'Y-m-d H:i:s')."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>