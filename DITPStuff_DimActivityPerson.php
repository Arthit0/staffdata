<?php 
include("connection.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE DITPStuff_DimActivityPerson";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }

$SqlServer = "select * from DITPStuff_DimActivityPerson ";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        (str_replace("Ma'ming","Maming",$data_loop['PersonNameTH']) == "Mr.Arifan  Maming") ? $val = str_replace("Ma'ming","Maming",$data_loop['PersonNameTH']) : $val = str_replace("'s","s",$data_loop['PersonNameTH']);

        $DITP_ONE = "INSERT INTO `ditpstuff_dimactivityperson`(`PersonId`, `PersonNo`, `PersonNameTH`, `PersonNameEN`, `ProvinceCode`, `ProvinceName`, `RegionNameTh`, `DistrictName`, `SubDistrictName`, `Telephone`, `email`, `IsThai`, `ActivityParticipateStatus`, `PropertyName`) 
                    VALUES ('".$data_loop['PersonId']."','".$data_loop['PersonNo']."','".$val."','".str_replace("นายI'AoM  1999's","Mr.Boonyaruk   Ngamlamai",$data_loop['PersonNameEN'])."','".$data_loop['ProvinceCode']."','".$data_loop['ProvinceName']."','".$data_loop['RegionNameTh']."','".$data_loop['DistrictName']."',
                    '".$data_loop['SubDistrictName']."','".str_replace("'0","0",$data_loop['Telephone'])."','".str_replace("Big'scup2019","Bigscup2019",$data_loop['email'])."','".$data_loop['IsThai']."','".$data_loop['ActivityParticipateStatus']."','".$data_loop['PropertyName']."')";
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