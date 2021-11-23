<?php
	require_once "../include/config.php";
	require_once "../include/DBAccess.php";
	
	$rs = DBSelect("SELECT count(*) FROM {$tableName}");
	$row = mysql_fetch_array($rs);
	$totalCnt = $row[0];
	
	$thisPage = @(int)$_POST["page"];
//	$totpages = ceil($totalCnt / $listUnit);
//	
//	$thisBlock = ceil($thisPage / $pageUnit);
	
	if($thisPage <= 1){
		$startNum = 0;
	}else{
		$startNum = ($thisPage-1) * $listUnit;
	}
	
	$strSQL = "";
	$strSQL = " SELECT seq, uname, title, comment_cnt, viewcnt, createtime ";
	$strSQL .= "  FROM {$tableName} ";
	$strSQL .= " ORDER BY seq DESC ";
	$strSQL .= " LIMIT {$startNum},{$listUnit} ";
	
	$rs = DBSelect($strSQL);
	
	$out = "";
	$out  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	$out .= "<lists totalcnt='{$totalCnt}'>\n";
	//$out .= "<lists totalcnt='{$totalCnt}' listunit='{$listUnit}' pageunit='{$pageUnit}' thisblock='{$thisBlock}' totpages='{$totpages}' thispage='{$thisPage}'>\n";
	
	while ( $row = mysql_fetch_array($rs) ) {
		$out .= "  <item seq=\"".$row[0]."\">\n";
		$out .= "    <uname>".$row[1]."</uname>\n";
		$out .= "    <btitle>".$row[2]."</btitle>\n";
		$out .= "    <bcommentcnt>".$row[3]."</bcommentcnt>\n";
		$out .= "    <bviewcnt>".$row[4]."</bviewcnt>\n";
		$out .= "    <bcreatetime>".$row[5]."</bcreatetime>\n";
		$out .= "  </item>\n";
	}
	
	$out .= "</lists>\n";
	header( "Content-type: application/xml; charset=utf-8" );
	echo $out;
?>