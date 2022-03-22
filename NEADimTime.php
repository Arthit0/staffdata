<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE neadimtime";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    } 
$SqlServer = "select * from NEADimTime";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
       $DITP_ONE = "      INSERT INTO `neadimtime`(`TimeNO`, `Month`, `Year`, `FYear`, `YearTH`, `FYearTH`, `QYear`, `QFYear`, `MShortName`, `MFullName`, `FMShortName`, `FMFullName`) 
       VALUES ('".mysql_escape($data_loop['TimeNO'])."','".mysql_escape($data_loop['Month'])."','".mysql_escape($data_loop['Year'])."',
       '".mysql_escape($data_loop['FYear'])."','".mysql_escape($data_loop['YearTH'])."','".mysql_escape($data_loop['FYearTH'])."','".mysql_escape($data_loop['QYear'])."',
       '".mysql_escape($data_loop['QFYear'])."','".mysql_escape($data_loop['MShortName'])."','".mysql_escape($data_loop['MFullName'])."','".mysql_escape($data_loop['FMShortName'])."',
       '".mysql_escape($data_loop['FMFullName'])."')";
       print_r($DITP_ONE);
       if ($mysqli->query($DITP_ONE) === FALSE ) {
           echo "Failed to connect to MySQL: " . $mysqli->error;
           die();
       } 
    }
}
echo "<br>";
echo "Success!!";
?>