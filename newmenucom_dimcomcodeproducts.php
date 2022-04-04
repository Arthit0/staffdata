<?php
include("connection.php");
include("helper.php");
ini_set("max_execution_time",0);


echo "//////////////////Step 1 ditpone_dimcomcodeproducts_bak//////////////////";
$TRUNCATE = "TRUNCATE ditpone_dimcomcodeproducts_bak";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
    $SqlServer = "SELECT * FROM dbo.DITPONE_DimComCodeProducts;";
    // echo $row['Activity_Id'];
    // $DITP_ONE = "INSERT INTO `ditpstuff_dimactivities_results` (`aid`, `Activity_Id`, `Activity_NameTH`, `ParticipateCount`, `CorporateCount`, `PersonCount`) VALUES (NULL, '".$row['Activity_Id']."', 'w', '0', '0', '0');";
    //         // print_r($DITP_ONE);
    // $rs = $mysqli->query($DITP_ONE);
      // print_r($SqlServer);
      $query_cr2 = sqlsrv_query($conn_ditp_Newmenucom, $SqlServer, array(), array("Scrollable" => 'static'));  
      if (sqlsrv_num_rows($query_cr2) >0){
        $total = sqlsrv_num_rows($query_cr2);
        $i = 1;
        while( $row = sqlsrv_fetch_array( $query_cr2, SQLSRV_FETCH_ASSOC) ) {
              // $DITP_ONE = "INSERT INTO `ditpstuff_dimactivities_results` (`aid`, `Activity_Id`,`TimeId` ,`Activity_NameTH`, `ParticipateCount`, `CorporateCount`, `PersonCount`) VALUES (NULL, '".mysql_escape($data_loop['Activity_Id'])."', '".mysql_escape($data_loop['TimeId'])."', '".mysql_escape($data_loop['Activity_NameTH'])."', '".mysql_escape($data_loop['ParticipateCount'])."', '".mysql_escape($data_loop['CorporateCount'])."', '".mysql_escape($data_loop['PersonCount'])."');";

            // die();
            $DITP_ONE = "INSERT INTO `ditpone_dimcomcodeproducts_bak` (`ComCode`, `ShowCode`, `ImExType`, `EnDescriptions`, `ThDescriptions`, `Unit1`, `Unit2Th`, `EnDescriptions2`, `ThDescriptions2`, `digits`, `code1`, `code3`, `code5`, `code7`) VALUES ('".$row['ComCode']."', '".mysql_escape($row['ShowCode'])."', '".$row['ImExType']."', '".mysql_escape($row['EnDescriptions'])."', '".mysql_escape($row['ThDescriptions'])."', '".mysql_escape($row['Unit1'])."', '".mysql_escape($row['Unit2Th'])."', '".mysql_escape($row['EnDescriptions2'])."', '".mysql_escape($row['ThDescriptions2'])."', '".mysql_escape($row['digits'])."', '".$row['code1']."', '".$row['code3']."', '".$row['code5']."', '".$row['code7']."');";
              // $DITP_ONE = "INSERT INTO `ditpone_dimcomcodeproducts_bak` (`ExpNo`, `Year`, `Month`, `CountryNo`, `ISO_Code`, `ComCode`, `ShowCode`, `HSCode11`, `ValueBaht`, `ValueUSD`, `Quantity`, `Uncode`) VALUES ('".mysql_escape($row['ExpNo'])."', '".mysql_escape($row['Year'])."', '".mysql_escape($row['Month'])."', '".mysql_escape($row['CountryNo'])."', '".mysql_escape($row['ISO_Code'])."', '".mysql_escape($row['ComCode'])."', '".mysql_escape($row['ShowCode'])."', '".mysql_escape($row['HSCode11'])."', '".mysql_escape($row['ValueBaht'])."', '".mysql_escape($row['ValueUSD'])."', '".mysql_escape($row['Quantity'])."', '".mysql_escape($row['Uncode'])."');";
            echo $DITP_ONE;
                          echo "\n";

              $rs = $mysqli->query($DITP_ONE);
              echo round(($i/$total)*100,4);
              echo "%";
              echo " (".$i."/".$total.")";
              echo "\n";
              $i++;
              if ($rs === FALSE ) {
                  echo "Failed to connect to MySQL: " . $mysqli->error;
              }  
        }          
      }

$rename = "RENAME TABLE ditpone_dimcomcodeproducts TO ditpone_dimcomcodeproducts_temp;";
    if ($mysqli->query($rename) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
$rename2 = "RENAME TABLE ditpone_dimcomcodeproducts_bak TO ditpone_dimcomcodeproducts;";
    if ($mysqli->query($rename2) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
$rename3 = "RENAME TABLE ditpone_dimcomcodeproducts_temp TO ditpone_dimcomcodeproducts_bak;";
    if ($mysqli->query($rename3) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
$updatenull = "UPDATE ditpone_dimcomcodeproducts SET code1=NULL WHERE code1 = 0;";
 if ($mysqli->query($updatenull) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
$updatenull = "UPDATE ditpone_dimcomcodeproducts SET code3=NULL WHERE code3 = 0;";
 if ($mysqli->query($updatenull) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
$updatenull = "UPDATE ditpone_dimcomcodeproducts SET code5=NULL WHERE code5 = 0;";
 if ($mysqli->query($updatenull) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
$updatenull = "UPDATE ditpone_dimcomcodeproducts SET code7=NULL WHERE code7= 0;";
 if ($mysqli->query($updatenull) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    error_log($mysqli->error);
    }
?>