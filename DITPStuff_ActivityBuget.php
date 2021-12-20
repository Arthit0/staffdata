<?php
include('connection.php');
ini_set('max_execution_time',0);
$TRUNCATE = "TRUNCATE ditpstuff_activitybudget";
    if ($mysqli->query($TRUNCATE) === FALSE ) {
    echo "Failed to connect to MySQL: " . $mysqli->error;
    }
$SqlServer = "select * from DITPStuff_ActivityBudget";
$query_cr2 = sqlsrv_query($conn_ditp, $SqlServer, array(), array("Scrollable" => 'static'));  
if (sqlsrv_num_rows($query_cr2) >0){
    while ($data_loop = sqlsrv_fetch_array($query_cr2, SQLSRV_FETCH_ASSOC)){
        $DITP_ONE = "INSERT INTO `ditpstuff_activitybudget`(`ActivityBudgetId`, `activity_id`, `budget_type`, `budget_id`, `budget_value`, `budget_name`) 
                     VALUES ('".$data_loop['ActivityBudgetId']."','".$data_loop['activity_id']."','".$data_loop['budget_type']."','".$data_loop['budget_id']."','".$data_loop['budget_value']."','".$data_loop['budget_name']."')";
        print_r($DITP_ONE);
        if ($mysqli->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            die();
        } 
    }
}
echo "Success!!"
?>