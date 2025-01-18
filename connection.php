<?php
error_reporting('E_ALL');
$host='localhost';
$user='root';
$dbpass='';
$db='fproject';
$con = mysql_connect($host,$user,$dbpass,$db);
if (!$con) {
	echo 'could not connect to database';
}else{
$connectdb=mysql_select_db($db);
if (!$connectdb) {
	echo"not connected";
   }else{
   	 "connected";
   }
}

?>