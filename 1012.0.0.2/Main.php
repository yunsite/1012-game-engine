﻿<?php
session_start();
include "Connect.php";

require('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;

$smarty->template_dir = './Smarty/templates/';
$smarty->compile_dir = './Smarty/templates_c/';
$smarty->config_dir = './Smarty/configs/';
$smarty->cache_dir = './Smarty/cache/';
$smarty->assign('title','游戏中');
$smarty->assign('op1','简介');
$smarty->assign('op2','教程');
$smarty->assign('op3','账户');
$smarty->assign('op4','历史');
$smarty->assign('op5','帮助');
$smarty->assign('op6','百科');
$smarty->assign('op7','论坛');
$smarty->assign('op8','关于');

$nam=$_SESSION['User'];

mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT Tx FROM userset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$tx=$info[0];
$tx='Image/'.$tx.'.png';



$smarty->assign('Tx',$tx);
$smarty->assign('User',$nam);
$smarty->assign('Authority',$_SESSION['Authority']);
$smarty->assign('Attitude',$_SESSION['Attitude']);

$User=$_SESSION['User'];

$Content=$_POST["s"];
$Attitude=$_SESSION['Attitude'];
if($Content!=''){
	if($Attitude==0)
		{
		$i=0;
		$xml_0=simplexml_load_file("Chat/data/ChatData_0.xml");
		while($xml_0->Message[$i]->Content!='')
			{$i++;}
		$xml_0->Message[$i]->Name=$User;
		$xml_0->Message[$i]->Content=$Content;
		$xml_0->Message[$i]->Time=date("H:i:s");
		$newXML_0 = $xml_0->asXML();
		$fp = fopen('Chat/data/ChatData_0.xml', "w");  
		fwrite($fp, $newXML_0);  
		fclose($fp);   
		header('Location: '.$_SERVER['PHP_SELF']);
		}
	if($Attitude==1)
		{
		$i=0;
		$xml_1=simplexml_load_file("Chat/data/ChatData_1.xml");
		while($xml_1->Message[$i]->Content!='')
			{$i++;}
		$xml_1->Message[$i]->Name=$User;
		$xml_1->Message[$i]->Content=$Content;
		$xml_1->Message[$i]->Time=date("H:i:s");
		$newXML_1 = $xml_1->asXML();
		$fp2 = fopen('Chat/data/ChatData_1.xml', "w");  
		fwrite($fp2, $newXML_1);  
		fclose($fp2);   
		header('Location: '.$_SERVER['PHP_SELF']);
		}

}
$smarty->display('Main.tpl');
