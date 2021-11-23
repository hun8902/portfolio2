<?php
	if($_GET["startland"] != NULL) {
		$startland = $_GET["startland"];
	}else{
		$startland = "land001";
	}
	//$theme_select = md5(sha1("land001"));
	$theme_select = $startland ;
	$randland=$_GET["randland"];
	$section=$_GET["section"];
	$set_num=$_GET["set_num"];
?>
<?php include $theme_select.".php"; ?>
