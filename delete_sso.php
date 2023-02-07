<?php
include("connectionSSO.php");
ini_set("max_execution_time",0);


  $result = $mysqli_sso->query('SELECT * FROM `tb_member` INNER JOIN tb_member_type1 ON tb_member.member_id = tb_member_type1.member_id  WHERE tb_member_type1.member_cid = "" OR tb_member_type1.member_cid LIKE "%-%"');
//   $result = $mysqli_sso->query('SELECT * FROM `tb_member` INNER JOIN tb_member_type1 ON tb_member.member_id = tb_member_type1.member_id  WHERE  tb_member_type1.member_cid = "" AND tb_member_type1.member_nameTh = "" AND tb_member_type1.member_lastnameTh = "" AND tb_member_type1.member_nameEn = "" AND tb_member_type1.member_lastnameEn = ""');
  //   
  
foreach($result as $val){
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
echo "Success!!"
?>