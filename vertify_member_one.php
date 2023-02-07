<?php
include("connectionSSO.php");
ini_set("max_execution_time",0);


  $result = $mysqli_sso->query("SELECT * FROM `tb_member_type1` INNER JOIN tb_member ON tb_member.member_id = tb_member_type1.member_id WHERE director_status = 1 AND status_case = 2");
  // $result = $this->query("SELECT * FROM `tb_member_type1` WHERE director_status = 1 AND status_case != 99 ");
  
foreach($result as $val){
  $status = true;
  $DBD_names = "";
  $user_names = "";
        
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://sso.ditp.go.th/sso/index.php/api/ck_com_dbd?cid='.$val['cid'].'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'async: false',
      'Cookie: PHPSESSID=9dcso94grvcn91e52u22vh31q5'
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  $response = json_decode($response);

  if(isset($response->ns0getDataResponse->return->arrayRRow->childTables[0]->rows)){
    foreach ($response->ns0getDataResponse->return->arrayRRow->childTables[0]->rows as $key => $value) {
        // $DBD_names .= $value->columns[2]->columnValue;
        $DBD_names = "";
        $user_names = "";
        if(isset($value->columns)){
          $DBD_names .= $value->columns[3]->columnValue;
          $DBD_names .= $value->columns[4]->columnValue;
        }else{
          $explode = explode(" ",$value[3]->columnValue);
          $DBD_names .= $explode[0];
          $explode2 = explode(" ",$value[4]->columnValue);
          (count($explode2) == '2')? $DBD_names .= $explode2[1]:$DBD_names .= $explode2[0];
        }
        // $user_names .= $result['member_title'];
        $explode = explode(" ",$val['member_nameTh']);
        $user_names .= $explode[0];
        $explode2 = explode(" ",$val['member_lastnameTh']);
        (count($explode2) == '2')? $user_names .= $explode2[1]:$user_names .= $explode2[0];
        // $user_names .= $val['member_nameTh'];
        // $user_names .= $val['member_lastnameTh'];
        $DBD_names = str_replace(["/"," "], "", $DBD_names);
        // var_dump($user_names , $DBD_names);
        // die;
        if($user_names != $DBD_names){
            $DITP_ONE = "UPDATE `tb_member_type1` SET `director_status`= 2,`status_case`= 1  WHERE member_id = ".$val['member_id'];
           if ($mysqli_sso->query($DITP_ONE) === FALSE ) {
            echo "Failed to connect to MySQL: 2" . $mysqli_sso->error;
            die();
            }
            print_r('เยี้ยม1');
          $status = false;   
        }else{
            $DITP_ONE = "UPDATE `tb_member_type1` SET `director_status`= 1,`status_case`= 99  WHERE member_id = ".$val['member_id'];
            if ($mysqli_sso->query($DITP_ONE) === FALSE ) {
                echo "Failed to connect to MySQL: 99" . $mysqli_sso->error;
                die();
            }
            print_r('เยี้ยม2');
            break;
        }
      }
  }else if($val['cid'] != '1100200530906'){
    $DELETE_tb_member_type1 = "DELETE FROM `tb_member_type1` WHERE  member_id =  ".$val['member_id'];
    $DELETE_tb_member = "DELETE FROM `tb_member` WHERE  member_id =  ".$val['member_id'];
    if ($mysqli_sso->query($DELETE_tb_member_type1) === FALSE ) {
        echo "Failed to connect to MySQL: DELETE_tb_member_type1" . $mysqli_sso->error;
        die();
    }
    print_r('เยี้ยม3');

    if ($mysqli_sso->query($DELETE_tb_member) === FALSE ) {
        echo "Failed to connect to MySQL: DELETE_tb_member" . $mysqli_sso->error;
        die();
    }
    print_r('เยี้ยม4');

  }
  
}
echo "Success!!"
?>