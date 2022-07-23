<?php
include("connect_pdpa.php");
include("helper.php");
ini_set("max_execution_time",0);

$SqlServer = "SELECT * FROM Person LEFT JOIN ConsentVersionData ON Person.CvId = ConsentVersionData.CvId 
                                   LEFT JOIN Consent ON ConsentVersionData.ConsId = Consent.ConsId  
                                   WHERE RefUid = 1220600045353"; 
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $arr ['Data']= [
                            "PersonId" => $data_loop['PersonId'],
                            "RefUid" => $data_loop['RefUid'],
                            "Client_Id" => $data_loop['Client_Id'],
                            "PersonName" => $data_loop['PersonName'],
                            "PersonEmail" => $data_loop['PersonEmail'],
                            "AcceptStatus" => $data_loop['AcceptStatus'],
                            "AcceptName" => ($data_loop['AcceptStatus'] == '1')? 'ยินยอมเเล้ว':'ยังไม่ได้ยินยอม',
                            "date" => date_format($data_loop['CrDate'],'Y-m-d H:i:s'),
                            "ConsentName" => $data_loop['ConsName'],
                        ];
    //    print_r($data_loop);
    //    print_r($arr);
                $SqlPersonOption = "SELECT * FROM PersonOption WHERE PersonId = 160";
                $query_cr3 = sqlsrv_query($conn_ditp, $SqlPersonOption, array(), array("Scrollable" => 'static'));  
                if (sqlsrv_num_rows($query_cr3) >0){
                    while ($PersonOption = sqlsrv_fetch_array($query_cr3, SQLSRV_FETCH_ASSOC)){
                        $SqlConsentOption = "SELECT * FROM ConsentOption WHERE ConsOptId = '".$PersonOption['ConsOptId']."'";
                        $query_cr4 = sqlsrv_query($conn_ditp, $SqlConsentOption, array(), array("Scrollable" => 'static'));  
                        if (sqlsrv_num_rows($query_cr4) >0){
                            while ($ConsentOption = sqlsrv_fetch_array($query_cr4, SQLSRV_FETCH_ASSOC)){
                            print_r($ConsentOption);
                            print_r(2);
                            }
                        }
                    }
                }   
    }
} 
// $SqlServer = "SELECT * FROM ConsentVersionData WHERE CvId = 46";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
// $SqlServer = "SELECT * FROM Consent WHERE ConsId = 2";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }


// $SqlServer = "SELECT * FROM SiteConsent WHERE SiteId = 5 and ConsId = 2";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
// $SqlServer = "SELECT * FROM SiteConsentOption WHERE ScId = 3 and  ConsOptId = 7";
// $query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
// if (sqlsrv_num_rows($query_cr2) >0){
//     while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
//        print_r($data_loop);
//        print_r(2);
//     }
// }
echo "<br>";
echo "Success!!";
?>