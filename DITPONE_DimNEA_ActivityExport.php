<?php
include("connection_NEA.php");
include("helper.php");
ini_set("max_execution_time",0);
$TRUNCATE = "TRUNCATE ditp_nea_export_user";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPONE_DimNEA_ActivityExport";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditp_nea_export_user`(`Act_Exp_No`, `Activity_Id`, `Com_Code`, `Com_Size`, `Com_Size_By_SME`, `Com_Size_Capital`, `Corporate_Id`, `Country_Name_Eng`, `Country_Name_TH`, `Endescriptions`, 
        `Export_Count`, `Export_No`, `F_Year`, `HS_Code11`, `HS_Code2`, `HS_Code4`, `HS_Code6`, `HS_Code8`, `ISO_Code`, `Monthno`, `NEA_Activity_To_DITP`, `Person_Id`, `Person_No`, `Rank_Activity`, `Rank_DITP_Activity`, 
        `Rank_Main_Course`, `Show_Code`, `Tax_No`, `TH_Descriptions_L1_Show_Code`, `TH_Descriptions_L2_Show_Code`, `TH_Descriptions_L3_Show_Code`, `TH_Descriptions_L4_Show_Code`, `TH_Descriptions_L5_Show_Code`, `Thdescriptions`,
         `Un_Code`, `Year_No`, `Zone_EN`, `Zone_TH`) VALUES
        ('".mysql_escape($data_loop['Act_Exp_No'])."','".mysql_escape($data_loop['Activity_Id'])."','".mysql_escape($data_loop['Com_Code'])."','".mysql_escape($data_loop['Com_Size'])."','".mysql_escape($data_loop['Com_Size_By_SME'])."',
        '".mysql_escape($data_loop['Com_Size_Capital'])."','".mysql_escape($data_loop['Corporate_Id'])."','".mysql_escape($data_loop['Country_Name_Eng'])."','".mysql_escape($data_loop['Country_Name_TH'])."','".mysql_escape($data_loop['Endescriptions'])."',
        '".mysql_escape($data_loop['Export_Count'])."','".mysql_escape($data_loop['Export_No'])."','".mysql_escape($data_loop['F_Year'])."','".mysql_escape($data_loop['HS_Code11'])."','".mysql_escape($data_loop['HS_Code2'])."',
        '".mysql_escape($data_loop['HS_Code4'])."','".mysql_escape($data_loop['HS_Code6'])."','".mysql_escape($data_loop['HS_Code8'])."','".mysql_escape($data_loop['ISO_Code'])."','".mysql_escape($data_loop['Monthno'])."',
        '".mysql_escape($data_loop['NEA_Activity_To_DITP'])."','".mysql_escape($data_loop['Person_Id'])."','".mysql_escape($data_loop['Person_No'])."','".mysql_escape($data_loop['Rank_Activity'])."','".mysql_escape($data_loop['Rank_DITP_Activity'])."',
        '".mysql_escape($data_loop['Rank_Main_Course'])."','".mysql_escape($data_loop['Show_Code'])."','".mysql_escape($data_loop['Tax_No'])."','".mysql_escape($data_loop['TH_Descriptions_L1_Show_Code'])."','".mysql_escape($data_loop['TH_Descriptions_L2_Show_Code'])."',
        '".mysql_escape($data_loop['TH_Descriptions_L3_Show_Code'])."','".mysql_escape($data_loop['TH_Descriptions_L4_Show_Code'])."','".mysql_escape($data_loop['TH_Descriptions_L5_Show_Code'])."','".mysql_escape($data_loop['Thdescriptions'])."','".mysql_escape($data_loop['Un_Code'])."',
        '".mysql_escape($data_loop['Year_No'])."','".mysql_escape($data_loop['Zone_EN'])."','".mysql_escape($data_loop['Zone_TH'])."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>