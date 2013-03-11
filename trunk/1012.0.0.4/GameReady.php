<?php
session_start();
include "Connect.php";
require('./Smarty/libs/Smarty.class.php');
$xml = simplexml_load_file("GameSetting.xml");

$smarty = new Smarty;

$smarty->template_dir = './Smarty/templates/';
$smarty->compile_dir = './Smarty/templates_c/';
$smarty->config_dir = './Smarty/configs/';
$smarty->cache_dir = './Smarty/cache/';
$smarty->assign('title','准备');


$User=$_SESSION['User'];


if($_SESSION['on']!=1)
	{echo "<script>alert('请先登录');window.location.href='index.php';</script>";}


mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT id FROM RoleSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
if($info[0])
	{$Created=1;}
else
	{$Created=0;}

$result=mysql_query("SELECT OverStamp FROM GameLogSet order by id DESC"); 
$info=mysql_fetch_array($result);
$LastTime=$info[0];



$xmlinfo = simplexml_load_file("GameInfo.xml");
$xmlset = simplexml_load_file("GameSetting.xml");
$readypeople=$xmlset->readypeople;
$readytime=$xmlset->readytime;
$playeramount=$xmlinfo->playeramount;
$peoplelimit=$xmlset->peoplelimit;
$playeramount=(int)$playeramount;
$peoplelimit=(int)$peoplelimit;
if(($playeramount>=$peoplelimit) && ($Created==0))
	{echo "<script>alert('此轮人数已满');window.location.href='index.php';</script>";}

if(($playeramount<=$peoplelimit) && ($Created==0))
	{
	$xmlinfo->playeramount=$xmlinfo->playeramount+1;
	$result=mysql_query("SELECT count(*) FROM RoleSet"); 
	$info=mysql_fetch_array($result);
	$Existpeople=$info[0];
	$Existpeople++;
	$Health=$xmlset->health;
	$result=mysql_query("SELECT * FROM UserSet WHERE Name='$User'"); 
	$info=mysql_fetch_array($result);
	$Last=$info[LastWord];
	$Kill=$info[KillWord];
	$Title=$info[TitleId];
	$x=$Existpeople%2;         // 判断玩家阵营
	if($x==0)
		{$l=4;}
	else
		{$l=11;}
	$result=mysql_query("INSERT INTO RoleSet (id,Name,Exp,Level,Strength,Agility,Endurance,Magic,TrumpAbility,Money,Status,Kills,Attitude,Contribution,Attack,Defense,Hit,Miss,Move,Health,MagicAttack,MagicDefense,MaxHealth,LastWord,KillWord,TitleId,LocationId,Discover,Cover,Lucky) VALUES ('$Existpeople','$User','0','0','0','0','0','0','0','0','0','0','$x','0','0','0','0','0','1','$Health','0','0','$Health','$Last','$Kill','$Title','$l','0','0','0')"); 
	$newXML = $xmlinfo->asXML();     //写入XML文件 
	$_SESSION['Attitude']=$x;
	$fp = fopen('GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp);  

	$now=time();
	$LastTime=(int)$LastTime;
	$now=(int)$now;
	$Between=$now-$LastTime;
	
	$readypeople=(int)$readypeople;
	$readytime=(int)$readytime;
	if(($playeramount>=$readypeople)&&($Between>=$readytime))
		{StartGame();
		}
	}

$xmlann = simplexml_load_file("GameData/Announcement.xml");
$annou=$xmlann->Content;

mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT Attitude FROM RoleSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Attitude=$info[0];

$_SESSION['Attitude']=$Attitude;

$open=$Attitude.'.tpl';

$result=mysql_query("SELECT Tx FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$tx=$info[0];
$tx='Image/'.$tx.'.png';


$result=mysql_query("SELECT Color1 FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Color1=$info[0];
$result=mysql_query("SELECT Color2 FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Color2=$info[0];
$result=mysql_query("SELECT Color3 FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Color3=$info[0];
$result=mysql_query("SELECT Color4 FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Color4=$info[0];
$result=mysql_query("SELECT Color5 FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Color5=$info[0];
$result=mysql_query("SELECT Color6 FROM UserSet WHERE Name='$User'"); 
$info=mysql_fetch_array($result);
$Color6=$info[0];


$Title=$xmlset->title;
$gamemode=$xmlinfo->gamemode;
$smarty->assign('Tx',$tx);
$smarty->assign('GameTitle',$Title);
$smarty->assign('gamemode',$gamemode);
$smarty->assign('User',$User);
$smarty->assign('Attitude',$Attitude);
$smarty->assign('LastTime',$LastTime);
$smarty->assign('Readytime',$readytime);
$smarty->assign('op1','简介');
$smarty->assign('op2','教程');
$smarty->assign('op3','账户');
$smarty->assign('op4','历史');
$smarty->assign('op5','帮助');
$smarty->assign('op6','百科');
$smarty->assign('op7','论坛');
$smarty->assign('op8','关于');
$smarty->assign('User',$_SESSION['User']);
$smarty->assign('Authority',$_SESSION['Authority']);
$smarty->assign('Announcement',$annou);
$smarty->assign('Color1',$Color1);
$smarty->assign('Color2',$Color2);
$smarty->assign('Color3',$Color3);
$smarty->assign('Color4',$Color4);
$smarty->assign('Color5',$Color5);
$smarty->assign('Color6',$Color6);

$Content=$_POST["s"];
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


$smarty->display($open);

$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;



