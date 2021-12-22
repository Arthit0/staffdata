<?php 
include("connection.php");
ini_set("max_execution_time",0);
// $TRUNCATE = "TRUNCATE ditpstuff_dimtimeactivity";
//     if ($mysqli->query($TRUNCATE) === FALSE ) {
//     echo "Failed to connect to MySQL: " . $mysqli->error;
//     }

$SqlServer = "SELECT * FROM  DITPSTuff_ActivityParticipate";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  

if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){

        // (str_replace("Ma'ming","Maming",$data_loop['PersonNameTH']) == "Mr.Arifan  Maming") ? $val = str_replace("Ma'ming","Maming",$data_loop['PersonNameTH']) : $val = str_replace("'s","s",$data_loop['PersonNameTH']);

        // $DITP_ONE = "INSERT INTO `ditpstuff_dimtimeactivity`(`TimeId`, `Month`, `Year`, `FinancialYear`, `YearTH`, `FinancialYearTH`, `QuarterNumber`, `ShortMonthNameEN`, `FullMonthNameEN`, `ShortMonthNameTH`, 
        //             `FullMonthNameTH`, `FinancialShortMonthName`, `FinancialFullMonthName`, `YearOfMonthNameEN`, `YearOfMonthNameTH`, `YearOfFinancialYearMonthNameEN`, `YearOfFinancialYearMonthNameTH`, `NextYearTH`, 
        //             `NextYearEN`, `FinancialYearTHAndMonth`, `ActivityYearTHAndMonth`) 
        //             VALUES ('".$data_loop['TimeId']."','".$data_loop['Month']."','".$data_loop['Year']."','".$data_loop['FinancialYear']."','".$data_loop['YearTH']."','".$data_loop['FinancialYearTH']."','".$data_loop['QuarterNumber']."','".$data_loop['ShortMonthNameEN']."','".$data_loop['FullMonthNameEN']."','".$data_loop['ShortMonthNameTH']."',
        //             '".$data_loop['FullMonthNameTH']."','".$data_loop['FinancialShortMonthName']."','".$data_loop['FinancialFullMonthName']."','".$data_loop['YearOfMonthNameEN']."','".$data_loop['YearOfMonthNameTH']."','".$data_loop['YearOfFinancialYearMonthNameEN']."','".$data_loop['YearOfFinancialYearMonthNameTH']."','".$data_loop['NextYearTH']."',
        //             '".$data_loop['NextYearEN']."','".$data_loop['FinancialYearTHAndMonth']."','".$data_loop['ActivityYearTHAndMonth']."')";
        // print_r($DITP_ONE);
        // if ($mysqli->query($DITP_ONE) === FALSE ) {
        //     echo "Failed to connect to MySQL: " . $mysqli->error;
        print_r($data_loop);
            die();
        // } 
    }
}
echo "Success!!"

?>