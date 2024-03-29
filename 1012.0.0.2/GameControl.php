<?php
include"Connect.php";
include"Chat/DataOperation.php";

function Initialize(){
	$xml = simplexml_load_file("GameInfo.xml");
	$xml->gamemode=1;   //1游戏准备，2游戏进行，3游戏人数已满，0游戏停止
	$xml->loop=$xml->loop+1;
	$xml->playeramount=0;
	$xml->begintime=null;
	$xml->overtime=null;
	$xml->maxkiller=null;
	$xml->maxcontributer=null;
	$xml->winner=null;
	$xml->content=' ';
	$xml->ending=null;

	$newXML = $xml->asXML();     //写入XML文件  
	$fp = fopen('GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp);  
	CleanChatData();
	DataBaseInitialize();//数据库初始化
}

function StartGame(){
	$xml = simplexml_load_file("GameInfo.xml");
	$xml->gamemode=2;
	$xml->begintime=date("Y-m-d H:i:s");
	$xml->beginstamp=time();
	$newXML = $xml->asXML();  
	$fp = fopen('GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp); 

}

function GameOver($end,$win){
	include"Connect.php";
	$xml = simplexml_load_file("GameInfo.xml");
	$xml->gamemode=0;
	$xml->overtime=date("Y-m-d H:i:s");
	$xml->overstamp=time();
	mysql_select_db("db_1012", $con);
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
	$newXML = $xml->asXML();  
	$fp = fopen('GameInfo.xml', "w");  
	fwrite($fp, $newXML);  
	fclose($fp);
	$xml = simplexml_load_file("GameInfo.xml");
	$now=time();
	$stime=$xml->beginstamp;
	$otime=$xml->overstamp;
	$pamount=$xml->playeramount;
	$loop=$xml->loop;
	$content=$xml->content;
	$chapter=$xml->chapter;
	$chapter=(int)$chapter;
	$loop=(int)$loop;
	$query3="INSERT INTO gamelogset (StartStamp,Winner,Ending,Amount,LoopTurn,Content,Chapter,OverStamp) VALUES ($stime,$win,$end,$pamount,$loop,'$content',$chapter,$now)";
	$result3=mysql_query($query3);  //将数据记录到数据库
	
	
	
	}


function DataBaseInitialize(){
	include"Connect.php";
	DataBaseClean();
	mysql_select_db("db_1012", $con);
	$xmlAch = simplexml_load_file("GameData/Achievement.xml");
	$i=0;
	while($xmlAch->Achievement[$i]->Name!=null)
		{
			$ID1=$xmlAch->Achievement[$i]->ID;
			$N1=$xmlAch->Achievement[$i]->Name;
			$D1=$xmlAch->Achievement[$i]->Description;
			$T1=$xmlAch->Achievement[$i]->Title;
			$I1=$xmlAch->Achievement[$i]->IsHide;
			$result=mysql_query("INSERT INTO achievementset (id,Name,Description,Title,IsHide) VALUES ('$ID1','$N1','$D1','$T1','$I1')"); 
			$i++;
		}
	$xmlItm = simplexml_load_file("GameData/Item.xml");
	$i=0;
	while($xmlItm->Item[$i]->Name!=null)
		{
			$ID2=$xmlItm->Item[$i]->ID;
			$T2=$xmlItm->Item[$i]->Type;
			$E2=$xmlItm->Item[$i]->Effect;
			$D2=$xmlItm->Item[$i]->Durable;
			$N2=$xmlItm->Item[$i]->Name;
			$L2=$xmlItm->Item[$i]->Location;
			$S2=$xmlItm->Item[$i]->SkillId;
			$De2=$xmlItm->Item[$i]->Description;
			$V2=$xmlItm->Item[$i]->Value;
			$result=mysql_query("INSERT INTO itemset (id,Type,Effect,Durable,Name,Location,SkillId,Description,Value) VALUES ('$ID2','$T2','$E2','$D2','$N2','$L2','$S2','$De2','$V2')"); 
			$i++;
		}

	$xmlLoc = simplexml_load_file("GameData/Location.xml");
	$i=0;
	while($xmlLoc->Location[$i]->Name!=null)
		{
			$ID3=$xmlLoc->Location[$i]->ID;
			$N3=$xmlLoc->Location[$i]->Name;
			$A3=$xmlLoc->Location[$i]->Attribution;
			$B3=$xmlLoc->Location[$i]->Building;
			$result=mysql_query("INSERT INTO locationset (id,Name,Attribution,Building) VALUES ('$ID3','$N3','$A3','$B3')"); 
			$i++;
		}

	$xmlNpc = simplexml_load_file("GameData/Npc.xml");
	$i=0;
	while($xmlNpc->Npc[$i]->Name!=null)
		{
			$ID4=$xmlNpc->Npc[$i]->ID;
			$NA4=$xmlNpc->Npc[$i]->Name;
			$EX4=$xmlNpc->Npc[$i]->Exp;
			$LE4=$xmlNpc->Npc[$i]->Level;
			$ST4=$xmlNpc->Npc[$i]->Strength;
			$AG4=$xmlNpc->Npc[$i]->Agility;
			$EN4=$xmlNpc->Npc[$i]->Endurance;
			$MA4=$xmlNpc->Npc[$i]->Magic;
			$TRAB4=$xmlNpc->Npc[$i]->TrumpAbility;
			$MO4=$xmlNpc->Npc[$i]->Money;
			$STA4=$xmlNpc->Npc[$i]->Status;
			$KI4=$xmlNpc->Npc[$i]->Kills;
			$AT4=$xmlNpc->Npc[$i]->Attitude;
			$CO4=$xmlNpc->Npc[$i]->Contribution;
			$ATT4=$xmlNpc->Npc[$i]->Attack;
			$DE4=$xmlNpc->Npc[$i]->Defense;
			$HI4=$xmlNpc->Npc[$i]->Hit;
			$MI4=$xmlNpc->Npc[$i]->Miss;
			$MOV4=$xmlNpc->Npc[$i]->Move;
			$HEA4=$xmlNpc->Npc[$i]->Health;
			$MAA4=$xmlNpc->Npc[$i]->MagicAttack;
			$MAD4=$xmlNpc->Npc[$i]->MagicDefense;
			$MH4=$xmlNpc->Npc[$i]->MaxHealth;
			$LW4=$xmlNpc->Npc[$i]->LastWord;
			$KW4=$xmlNpc->Npc[$i]->KillWord;
			$TI4=$xmlNpc->Npc[$i]->TitleId;
			$AR4=$xmlNpc->Npc[$i]->ArmorId;
			$HE4=$xmlNpc->Npc[$i]->HelmetId;
			$SH4=$xmlNpc->Npc[$i]->ShoeId;
			$TR4=$xmlNpc->Npc[$i]->TrumpId;
			$TRA4=$xmlNpc->Npc[$i]->TransportId;
			$ACC4=$xmlNpc->Npc[$i]->AccessoriesId;
			$WE4=$xmlNpc->Npc[$i]->WeaponId;
			$LO4=$xmlNpc->Npc[$i]->LocationId;
			$result=mysql_query("INSERT INTO roleset (id,Name,Exp,Level,Strength,Agility,Endurance,Magic,TrumpAbility,Money,Status,Kills,Attitude,Contribution,Attack,Defense,Hit,Miss,Move,Health,MagicAttack,MagicDefense,MaxHealth,LastWord,KillWord,TitleId,ArmorId,HelmetId,ShoeId,TrumpId,TransportId,AccessoriesId,WeaponId,LocationId) VALUES ('$ID4','$NA4','$EX4','$LE4','$ST4','$AG4','$EN4','$MA4','$TRAB4','$MO4','$STA4','$KI4','$AT4','$CO4','$ATT4','$DE4','$HI4','$MI4','$MOV4','$HEA4','$MAA4','$MAD4','$MH4','$LW4','$KW4','$TI4','$AR4','$HE4','$SH4','$TR4','$TRA4','$ACC4','$WE4','$LO4')"); 
			$i++;
		}
		
		$xmlSki = simplexml_load_file("GameData/Skill.xml");
		$i=0;
		while($xmlSki->Skill[$i]->Name!=null)
		{
			$ID5=$xmlSki->Skill[$i]->ID;
			$T5=$xmlSki->Skill[$i]->Type;
			$N5=$xmlSki->Skill[$i]->Name;
			$D5=$xmlSki->Skill[$i]->Description;
			$L5=$xmlSki->Skill[$i]->Level;
			$result=mysql_query("INSERT INTO skillset (id,Name,Type,Description,Level) VALUES ('$ID5','$N5','$T5','$D5','$L5')"); 
			$i++;
		}

		$xmlEve = simplexml_load_file("GameData/Event.xml");
		$i=0;
		while($xmlEve->Event[$i]->Name!=null)
		{
			$ID6=$xmlEve->Event[$i]->ID;
			$E6=$xmlEve->Event[$i]->ExpAdd;
			$N6=$xmlEve->Event[$i]->Name;
			$M6=$xmlEve->Event[$i]->MoneyChange;
			$H6=$xmlEve->Event[$i]->HPChange;
			$result=mysql_query("INSERT INTO eventset (id,ExpAdd,Name,MoneyChange,HPChange) VALUES ('$ID6','$E6','$N6','$M6','$H6')"); 
			$i++;
		}

}

function DataBaseClean(){
	include"Connect.php";
	mysql_select_db("db_1012", $con);
	$result=mysql_query("DELETE FROM achievementset");
	$result=mysql_query("DELETE FROM eventset");
	$result=mysql_query("DELETE FROM itemset");
	$result=mysql_query("DELETE FROM locationset");
	$result=mysql_query("DELETE FROM practiceset");
	$result=mysql_query("DELETE FROM roleset");
	$result=mysql_query("DELETE FROM skillset");
}

?>