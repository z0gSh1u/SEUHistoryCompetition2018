<?php
// public head check script for admin user
// 1. check usertype
// 2. check token
// 3. get db access authorization

error_reporting(0);
define("DBACCESS", "vbbvXmtEw9SRyoVs");
include_once ('../tools/safe_token_api.php');
$sess_name = session_name();
if (session_start())
	setcookie($sess_name, session_id(), null, '/', null, null, true);
if ($_SESSION['usrtype'] != 2) {
	session_unset();
session_destroy();
unset($_SESSION);
	echo "<script>alert('非法访问！');</script>";
	echo "<script>window.close();</script>";
	die();
	exit();
}
if (!Crumb::verifyToken($_SESSION['fdyUsrname'], $_SESSION['token']))
{
	session_unset();
session_destroy();
unset($_SESSION);
	echo "<script>alert('非法访问！');</script>";
	echo "<script>window.close();</script>";
	die();
	exit();
}
?>