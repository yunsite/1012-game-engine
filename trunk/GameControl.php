<?php
include"Connect.php";
function Initialize(){
	$xml = simplexml_load_file("Tmp/GameInfo.xml");
	$xml->gamemode=1;
	$xml->loop=$xml->loop+1;
	$xml->playeramount=0;
	$xml->begintime=null;
	$xml->overtime=null;
	$xml->maxkiller=null;
	$xml->maxcontributer=null;
	$xml->winner=null;
	$xml->content=null;
	$xml->ending=null;

	$newXML = $xml->asXML();     //写入XML文件  
	$fp = fopen('Tmp/GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp);   
	//数据库初始化（待完成）
}

function StartGame(){
	$xml = simplexml_load_file("Tmp/GameInfo.xml");
	$xml->gamemode=2;
	$xml->begintime=date("Y-m-d H:i:s");
	$newXML = $xml->asXML();  
	$fp = fopen('Tmp/GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp); 
}

function GameOver($end,$win)
	$xml = simplexml_load_file("Tmp/GameInfo.xml");
	$xml->gamemode=0;
	$xml->overtime=date("Y-m-d H:i:s");
	mysql_select_db("1012", $con);
	$query="SELECT Name FROM roleset ORDER BY Kills DESC";
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$xml->maxkiller=$info[0];
	$query2="SELECT Name FROM roleset ORDER BY Contribution DESC";
	$result2=mysql_query($query2);
	$info2=mysql_fetch_array($result2);
	$xml->maxcontributer=$info2[0];
	$xml->ending=$end;
	$xml->winner=$win;
	$query3="INSERT INTO gamelogset (StartTime,OverTime,Winner,Ending,Amount,Loop,Content,Chapter) VALUES ($xml->starttime,$xml->overtime,$xml->winner,$xml->ending,$xml->palyeramount,$xml->loop,$xml->content,$xml->chapter)";
	$result3=mysql_query($query3);  //将数据记录到数据库


	$newXML = $xml->asXML();  
	$fp = fopen('Tmp/GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp); 
?>