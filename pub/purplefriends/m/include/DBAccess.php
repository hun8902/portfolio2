<?php
DBConn($DBHost, $DBUser, $DBPass, $DBName);

function DBConn($host, $user, $pass, $dbname){
	$conn = mysql_connect($host, $user, $pass)
    or die("connect error!!" . mysql_error());
	
	mysql_select_db($dbname);
	
	return $conn;
}

function DBSelect($strSQL){
	$rs = mysql_query($strSQL);
	
	return $rs;
}
?>