<?php 
	require_once "../include/config.php";
	require_once "../include/DBAccess.php";
	
	$uname = @$_POST["uname"];
	$title = @$_POST["title"];
	$content = @$_POST["content"];
	$password = @$_POST["password"];
	
	$uname = htmlspecialchars($uname);
	$title = htmlspecialchars($title);
	$content = htmlspecialchars($content);
	
	$strSQL = " INSERT INTO {$tableName}(uname, title, content, password, createtime) ";
	$strSQL .= " VALUES ('{$uname}', '{$title}', '{$content}', '{$password}', now())";
	
	DBSelect($strSQL);
?>