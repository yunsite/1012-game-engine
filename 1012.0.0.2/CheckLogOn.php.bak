<?php
session_start();
include"Connect.php";
require('./Smarty/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = './Smarty/blog/templates/';
$smarty->compile_dir = './Smarty/blog/templates_c/';
$smarty->config_dir = './Smarty/blog/configs/';
$smarty->cache_dir = './Smarty/blog/cache/';


$smarty->assign('title','db_1012');
$usr=$_POST["user"];
$pas=$_POST["password"];
if(!filter_var($usr, FILTER_SANITIZE_STRING)||!filter_var($pas, FILTER_SANITIZE_STRING))  //校验用户的输入
 {
echo "<script>alert('输入的字符不符合规范！');window.location.href='Register.php';</script>";

 }
else
 {
mysql_select_db("db_1012", $con);
$query="SELECT * from userset where Name='$usr'";
$result=mysql_query($query); 
$CheckPass=mysql_fetch_array($result);
echo $CheckPass[Password];
if($CheckPass[Password]==$pas){
	$_SESSION['on']=1;
	$_SESSION['User']=$usr;
	if($CheckPass[Authority]!=null)
		{$_SESSION['Authority']=$CheckPass[Authority];}
	Header("Location: index.php");
	}
else
	{
	echo "<script LANGUAGE='javascript'>alert('用户名或密码错误');</script>";
	}
 }
?>