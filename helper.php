<?php
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   // return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   	$str = preg_replace('/[^\n\r\s"\'\!<>\[\]\#|ก-๙เ,.()%@=_{}!$&*฿? :;+A-Za-z0-9-]/', '', $string);
	return $str;
}
function mysql_escape($inp)
{ 
    if(is_array($inp)) return array_map(__METHOD__, $inp);

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a",","), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } 

    return $inp; 
}
function in_error_log($log_msg)
{
    $log_filename = "log/error/";
    if (!file_exists($log_filename)) 
    {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
} 
// call to function
?>
