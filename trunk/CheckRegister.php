﻿<?php
session_start();
include"Connect.php";
require('./Smarty/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = './Smarty/blog/templates/';
$smarty->compile_dir = './Smarty/blog/templates_c/';
$smarty->config_dir = './Smarty/blog/configs/';
$smarty->cache_dir = './Smarty/blog/cache/';


$smarty->assign('title','1012');

$nam=$_POST["user"];
$pas=$_POST["password"];
$emi=$_POST["email"];
$saf=$_POST["safe"];
//echo $nam.$pas.$emi.$saf;
if(!filter_var($nam, FILTER_SANITIZE_STRING)||!filter_var($pas, FILTER_SANITIZE_STRING)||!filter_var($emi, FILTER_VALIDATE_EMAIL)||!filter_var($saf, FILTER_SANITIZE_STRING))  //校验用户的输入
 {
echo "<script>alert('输入的字符不符合规范！');window.location.href='Register.php';</script>";

 }
else
 {
mysql_select_db("1012", $con);
$query="INSERT INTO userset (Password,Email,Name,Safe,Money,Score) Values ('$pas','$emi','$nam','$saf',0,0)";
$result=mysql_query($query); 
mysql_close($con);
if($result){
	$_SESSION['on']=1;
	echo "<script>alert('注册成功！');window.location.href='index.php';</script>";
	}
 }
