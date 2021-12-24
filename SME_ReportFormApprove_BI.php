<?php 
include("connection_SME.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE sme_reportformapprove_bi";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }

$SqlServer = "select * from ReportFormApprove_BI";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){

        $DITP_ONE = "INSERT INTO `sme_reportformapprove_bi`(`Activity_Form_Id`, `Company`, `Corporate_number`, `Address`, `SubDistrict`, `District`, `Province`, `BangkokandCenter`, 
        `Sector`, `Member_type`, `ReferanceSME`, `QOLQE_Activity`, `Activity_name`, `Start_Date`, `Organizations`, `Organized_time`, `Year`, `Country`, `City`, `Continent`, `Activity_type`, 
        `Budget`, `Limit_type`, `Send_the_council`, `QOLQE_Department`, `Activity_name_Department`, `Date_Department`, `Start_Date_Department`, `End_Date_Department`, `Organization_Department`, 
        `Organized_time_by Department`, `Year_Department`, `Country_Department`, `City_Department`, `Continent_Department`, `Activity_type_Department`, `Limit_type_Department`, `Meeting_Round`, 
        `Amount_Approved_Department`, `Treasury_Approval_Amount`, `Status_Pid`, `Disbursement_Status`, `CancelStatus`, `Cancel_Remark`, `Export_Balance`, `Disciption_Export_Balance`, `Product_Group`, 
        `Product_type`, `Product`, `Send_Pid_Date`, `Council_Approve_Pid_Date`, `Department_Approve_Pid_Date`, `Board_Approve_Dtae_Pid`, `Submit_Disbursement_Documents_Date`, `Council_Approve_Documents_Date`,
         `Department_Approve_Date`, `Treasury_Date`, `Treasury_Approve_Date`, `Check_Date`, `Already_Used_Rights_ProductShow`, `Already_Used_Rights_BOP`, `Already_Used_Rights_Virtual`, `Cancel_Rights`, `Cut_Right_Next_Round`) 
        VALUES ('".$data_loop['Activity_Form_Id']."','".mysql_escape($data_loop['บริษัท'])."', '".$data_loop['เลขนิติบุคคล']."','".mysql_escape($data_loop['ที่อยู่'])."','".$data_loop['ตำบล']."','".$data_loop['อำเภอ']."',
        '".$data_loop['จังหวัด']."','".$data_loop['BangkokandCenter']."','".$data_loop['ภาค']."','".$data_loop['ประเภทสมาชิกกรม']."', '".$data_loop['ReferanceSME']."','".mysql_escape($data_loop['QOLQEตามใบสมัคร'])."',
        '".mysql_escape($data_loop['ชื่อกิจกรรมตามใบสมัคร'])."','".$data_loop['วันที่จัดงานตามใบสมัคร']."','".mysql_escape($data_loop['หน่วยงานที่จัดตามใบสมัคร'])."','".$data_loop['ครั้งที่จัดตามใบสมัคร']."','".$data_loop['ปีที่จัดงานตามใบสมัคร']."',
        '".$data_loop['ประเทศที่จัดตามใบสมัคร']."','".$data_loop['เมืองที่จัดตามใบสมัคร']."','".$data_loop['ทวีปตามใบสมัคร']."','".$data_loop['ประเภทกิจกรรมใบสมัคร']."','".$data_loop['จำนวนเงินขอสนับสนุน']."',
        '".$data_loop['ประเภทวงเงินตามใบสมัคร']."','".$data_loop['ส่งสภา']."','".$data_loop['QOLQEกรม']."','".mysql_escape($data_loop['ชื่อกิจกรรมตามกรม'])."','".$data_loop['วันที่จัดงานตามกรม']."','".$data_loop['วันเริ่มจัดงานตามกรม']."',
        '".$data_loop['วันสิ้นสุดจัดงานตามกรม']."','".mysql_escape($data_loop['หน่วยงานที่จัดตามกรม'])."','".$data_loop['ครั้งที่จัดตามกรม']."','".$data_loop['ปีที่จัดงานตามกรม']."','".mysql_escape($data_loop['ประเทศที่จัดตามกรม'])."','".mysql_escape($data_loop['เมืองที่จัดตามกรม'])."',
        '".mysql_escape($data_loop['ทวีปจัดตามกรม'])."','".mysql_escape($data_loop['ประเภทกิจกรรมตามกรม'])."', '".$data_loop['ประเภทวงเงินตามกรม']."','".$data_loop['รอบการประชุม']."','".$data_loop['ยอดเงินอนุมัติจากคณะกรรม']."','".$data_loop['ยอดเงินอนุมัติจากคลัง']."',
        '".$data_loop['สถานะใบสมัคร']."','".$data_loop['สถานะเบิกจ่าย']."','".mysql_escape($data_loop['CancelStatus'])."','".mysql_escape($data_loop['Cancel_Remark'])."','".$data_loop['ยอดส่งออหลังร่วมกิจกรรม']."','".mysql_escape($data_loop['หมายเหตุกรณีไม่มียอดส่งออก'])."',
        '".mysql_escape($data_loop['กลุ่มสินค้า'])."','".mysql_escape($data_loop['ประเภทสินค้าหลัก'])."','".mysql_escape($data_loop['สินค้า'])."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่ส่งใบสมัคร'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่สภาอนุมัติใบสมัคร'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่กรมอนุมัติใบสมัคร'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่คณะกรรมการอนุมัติใบสมัคร'])))."',
        '".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่ส่งเอกสารเบิกจ่าย'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่สภาอนุมัติเอกสารเบิกจ่าย'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่คลังรับเอกสาร'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่คลังอนุมัติ'])))."','".strftime('%m-%d-%Y', strtotime(str_replace('/','-',$data_loop['วันที่รับเช็ค'])))."','".$data_loop['สิทธิที่ใช้ไปแล้วแสดสินค้า']."','".$data_loop['สิทธิที่ใช้ไปแล้วงานBOP']."',
        '".$data_loop['สิทธิที่ใช้ไปแล้วงานVirtual']."','".$data_loop['นับสิทธิยกเลิก']."','".$data_loop['จำนวนสิทธิที่ตัดในรอบถัดไป']."','')";
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