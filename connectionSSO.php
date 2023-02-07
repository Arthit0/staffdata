<?php
$mysqli = new mysqli("10.8.99.131","oneuat","Ibusiness19#","oneuat");
// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}else{
  echo "connected Mysqli";
}

$mysqlis = new mysqli("10.8.99.131","oneuat","Ibusiness19#","oneuat_dev");
// Check connection
if ($mysqlis->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqlis->connect_error;
  exit();
}else{
  echo "connected Mysqli uat";
}

$mysqli_sso = new mysqli("10.8.99.39","ssodev","xBWupnIJwcj366nR","ssodev");
// Check connection
if ($mysqli_sso->connect_errno) {
  echo "Failed to connect to MySQL SSO: " . $mysqli_sso->connect_error;
  exit();
}else{
  echo "connected Mysqli SSO";
}

$mysqli_ssouat = new mysqli("10.8.99.39","ssodev","xBWupnIJwcj366nR","ssouat");
// Check connection
if ($mysqli_ssouat->connect_errno) {
  echo "Failed to connect to MySQL SSO UAT: " . $mysqli_ssouat->connect_error;
  exit();
}else{
  echo "connected Mysqli SSO UAT";
}

?>

