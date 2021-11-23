<?php
	require_once "../include/config.php";
	require_once "../include/DBAccess.php";
	
	for($i=1; $i<=1000; $i++){
		$uname = "user".$i;
		$title = "title ".$i;
		$content = "content content content \ncontent content content \ncontent content content \n".$i;
		
		$strSQL = " INSERT INTO {$tableName}(uname, title, content, password, createtime) ";
		$strSQL .= " VALUES ('$uname', '$title', '$content', '12341', now());";
		
		echo $strSQL."<BR>";
		//exit;
		
		$rs = DBSelect($strSQL);
	}
?>