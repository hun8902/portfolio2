<?php 
	require_once "../include/config.php";
	require_once "../include/DBAccess.php";
	
	$seq = @$_POST["seq"];
	
	$strSQL = " UPDATE {$tableName} SET viewcnt=viewcnt+1 WHERE seq={$seq}";
	
	DBSelect($strSQL);
	
	$strSQL = " SELECT seq, uname, title, content, viewcnt, createtime ";
	$strSQL .= "  FROM {$tableName}";
	$strSQL .= " WHERE seq =".$seq;
	
	$rs = DBSelect($strSQL);
	
	$out = "";
	
	$row = mysql_fetch_array($rs);
	
	$out  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	$out .= "<lists>\n";
	$out .= "  <item seq=\"".$row[0]."\">\n";
	$out .= "    <uname>".$row[1]."</uname>\n";
	$out .= "    <btitle>".$row[2]."</btitle>\n";
	$out .= "    <bcontent>".$row[3]."</bcontent>\n";
	$out .= "    <bviewcnt>".$row[4]."</bviewcnt>\n";
	$out .= "    <bcreatetime>".$row[5]."</bcreatetime>\n";
	
	$strSQL = " SELECT no, uname, content, createtime ";
	$strSQL .= "  FROM comment";
	$strSQL .= " WHERE seq =".$seq;
	$strSQL .= " ORDER BY no DESC;";
	
	$rs = DBSelect($strSQL);
	
	while ( $row = mysql_fetch_array($rs) ) {
		$out .= "    <comment>\n";
		$out .= "      <cno>".$row[0]."</cno>\n";
		$out .= "      <cuname>".$row[1]."</cuname>\n";
		$out .= "      <ccontent>".$row[2]."</ccontent>\n";
		$out .= "      <ccreatetime>".$row[3]."</ccreatetime>\n";
		$out .= "    </comment>\n";
	}
	
	$out .= "  </item>\n";
	$out .= "</lists>\n";
	
	header( "Content-type: application/xml; charset=utf-8" );
	echo $out;
?>