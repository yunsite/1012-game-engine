<?php
session_start();
require('./Smarty/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = './Smarty/templates/';
$smarty->compile_dir = './Smarty/templates_c/';
$smarty->config_dir = './Smarty/configs/';
$smarty->cache_dir = './Smarty/cache/';


$smarty->assign('title','1012');

$_SESSION['on']=0;

Header("Location: index.php");

?>