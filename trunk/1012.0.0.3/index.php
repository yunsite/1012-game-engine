<?php
session_start();
require('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;

$smarty->template_dir = './Smarty/templates/';
$smarty->compile_dir = './Smarty/templates_c/';
$smarty->config_dir = './Smarty/configs/';
$smarty->cache_dir = './Smarty/cache/';

$smarty->assign('title','首页');
$smarty->assign('op1','简介');
$smarty->assign('op2','教程');
$smarty->assign('op3','账户');
$smarty->assign('op4','历史');
$smarty->assign('op5','帮助');
$smarty->assign('op6','百科');
$smarty->assign('op7','论坛');
$smarty->assign('op8','关于');
$smarty->assign('LogOn',$_SESSION['on']);
if($_SESSION['on'] != 1)
	{$smarty->assign('Log','登陆&注册');}
$xml = simplexml_load_file("GameInfo.xml");
$gamemode=$xml->gamemode;
$smarty->assign('gamemode',$gamemode);

if (!isset($_COOKIE["user"]))
	{$smarty->assign('first',1);}      //判断用户是否是第一次来访，需要在tpl中修改输出


$time0=$xml->beginstamp;
$loop=$xml->loop;
$chapter=$xml->chapter;
$now=time();
$time2=$now-$time0;
$time=date("i",$time2);
$smarty->assign('time',$time);
$smarty->assign('loop',$loop);
if($chapter==1)
	{$chap='第一章：名为现实的幻觉';}
$smarty->assign('chapter',$chap);
$smarty->assign('User',$_SESSION['User']);
$smarty->assign('Authority',$_SESSION['Authority']);
$smarty->display('index.tpl');




//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;


?>
