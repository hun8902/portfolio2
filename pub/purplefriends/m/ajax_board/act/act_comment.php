<?php 
	require_once "../include/config.php";
	require_once "../include/DBAccess.php";
	
	$seq = @$_POST["seq"];
	$uname = @$_POST["uname"];
	$content = @$_POST["content"];
	$password = @$_POST["password"];
	
	$uname = htmlspecialchars($uname);
	$content = htmlspecialchars($content);
	
	$strSQL = " INSERT INTO comment(seq, uname, content, password, createtime) ";
	$strSQL .= " VALUES ({$seq}, '{$uname}', '{$content}', '{$password}', now())";
	
	DBSelect($strSQL);
	
	$strSQL = " UPDATE {$tableName} SET comment_cnt=comment_cnt+1 WHERE seq={$seq}";
	
	DBSelect($strSQL);
?>