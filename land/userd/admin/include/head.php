<?php
session_start();
if(isset($_SESSION["id"])){}else{header('location:index.php');}

$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

$s_id=  $_SESSION["id"];
$sql = mq("select level from gosu_member WHERE id='$s_id'");
$member_level = mysqli_num_rows($sql); 
 while($member_level = $sql->fetch_array()){
	$level =  $member_level['level'];
 }


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>관리자 페이지</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="/admin/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="/admin/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="/admin/assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
	<link rel="stylesheet" href="http://html.codedthemes.com/datta-able/bootstrap/assets/plugins/data-tables/css/datatables.min.css">
	<link rel="stylesheet" href="http://html.codedthemes.com/datta-able/bootstrap/assets/plugins/jstree/css/style.min.css">
	<link rel="stylesheet" href="http://html.codedthemes.com/datta-able/bootstrap/assets/plugins/fullcalendar/css/fullcalendar.min.css">

    <!-- morris css -->
    <link rel="stylesheet" href="/admin/assets/plugins/chart-morris/css/morris.css">
    <link rel="stylesheet" href="/admin/assets/css/style.css">

</head>
