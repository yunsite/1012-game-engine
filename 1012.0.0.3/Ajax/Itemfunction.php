<?php
function Put2Bag($tmp)
{
	$nam=$_SESSION['User'];
	include "../Connect.php";
	mysql_select_db("db_1012", $con);

	$flag=0;
	$result=mysql_query("SELECT Bag1 FROM roleset WHERE Name='$nam'"); 
	$info=mysql_fetch_array($result);
	if($info[0]=='')
		{
		$result0=mysql_query("UPDATE roleset SET Bag1 = $tmp WHERE Name='$nam'");
		$flag=1;
		}
	if($flag==0)
		{$result=mysql_query("SELECT Bag2 FROM roleset WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		if($info[0]=='')
			{
			$result0=mysql_query("UPDATE roleset SET Bag2 = $tmp WHERE Name='$nam'");
			$flag=1;

			}
		}
	if($flag==0)
		{$result=mysql_query("SELECT Bag3 FROM roleset WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		if($info[0]=='')
			{
			$result0=mysql_query("UPDATE roleset SET Bag3 = $tmp WHERE Name='$nam'");
			$flag=1;
			}
		}
	if($flag==0)
	{
		$result=mysql_query("SELECT Bag4 FROM roleset WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		if($info[0]=='')
			{
			$result0=mysql_query("UPDATE roleset SET Bag4 = $tmp WHERE Name='$nam'");
			$flag=1;
			}
	}
	if($flag==0)
	{
		$result=mysql_query("SELECT Bag5 FROM roleset WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		if($info[0]=='')
			{
			$result0=mysql_query("UPDATE roleset SET Bag5 = $tmp WHERE Name='$nam'");
			$flag=1;
			}
	}
	if($flag==0)
		{echo 'full';
		return 0;}
	else
		{return 1;}

}

function Heal($effect,$durable)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'");
$info=mysql_fetch_array($result);
$health=$info['Health'];
$maxhealth=$info['MaxHealth'];
if(($effect+$health)>=$maxhealth)
	{$newhealth=$maxhealth;}
else
	{$newhealth=$effect+$health;}

$result0=mysql_query("UPDATE roleset SET Health = $newhealth WHERE Name='$nam'");
}

function Poison($effect,$durable,$special)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'");
$info=mysql_fetch_array($result);
$health=$info['Health'];
//这里可以加上判断下毒者是否有增强技能
if(($health-$effect)>0)
	{$newhealth=$health-$effect;
	$result0=mysql_query("UPDATE roleset SET Health = $newhealth WHERE Name='$nam'");
	}
else
	{Death($special,'Posuin');}     //被毒死，第一个参数是下毒人id
}

function Trap($itemid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$local=$info['Location'];
$useid=$info['id'];

$result=mysql_query("SELECT COUNT(*) FROM itemset"); 
$info=mysql_fetch_array($result);
$num=$info[0];
$num++;

$result=mysql_query("SELECT * FROM itemset WHERE id='$itemid'"); 
$info=mysql_fetch_array($result);
$newtype=$info['Type'];
$neweffect=$info['Effect'];
$newname=$info['Name'];
$newdescription=$info['Description'];
$newpicture=$info['Picture'];


mysql_query("INSERT INTO itemset (id,Type,Effect,Durable,Name,Location,Description,Picture,Special) 
VALUES ('$num', 'T', '$neweffect','$newname','$local','$newdescription','$newpicture',''$useid)");

}


function Fail()
{
echo "<script>alert('现在的时机不对');</script>";
}


function Lord($effect,$durable,$type,$skillid)
{
require "Ajax/Skillfunction.php";
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$weaponid=$info['WeaponId'];
$roleskill=$info['Skills'];
$result=mysql_query("SELECT * FROM itemset WHERE id='$weaponid'"); 
$info=mysql_fetch_array($result);
$weapontype=$info['Type'];
$oldskill=$info['Special'];
if($weapontype!='WG')
	{echo "<script>alert('要装子弹你总得先装把枪吧！');</script>";}
else
	{
	SkillForget($oldskill);
	SkillLearn($skillid);
	mysql_query("UPDATE itemset SET Special = $skill WHERE id='$weaponid'");
	}
}


function Learn($skillid)
{
	SkillLearn($skillid);
}

function Open($durable)

{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$durable--;
if($durable==0)
	{$result0=mysql_query("UPDATE roleset SET $usename = NULL WHERE Name='$nam'");}
else
	{$result0=mysql_query("UPDATE itemset SET Durable = $durable WHERE id='$touseid'");}

//留待以后再写吧

}

function EquipW($effect,$skillid,$touseid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$attack=$info['Attack'];
$lucky=$info['Lucky'];
echo $attack;
$oldweapon=$info['WeaponId'];      //读取旧装备id和人物属性
if($oldweapon==''){                //没有旧装备
	$attack+=$effect;
	echo $attack;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET Attack = $attack,WeaponId = $touseid WHERE Name='$nam'");
	return 0;

	}
else
	{
	$result=mysql_query("SELECT * FROM itemset WHERE id='$oldweapon'"); 
	$info=mysql_fetch_array($result);
	$oldskill=$info['SkillID'];
	$oldeffect=$info['Effect'];         //读取旧装备属性
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newattack=$attack-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Attack = $newattack,WeaponId = $touseid WHERE Name='$nam'");                 //装备新装备
	return $oldweapon;                 //将旧装备放入背包
	}
}



function EquipT($effect,$skillid,$touseid)
{

$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$attack=$info['Attack'];
$defense=$info['Defense'];
$hit=$info['Hit'];
$miss=$info['Miss'];
$magicattack=$info['MagicAttack'];
$magicdefense=$info['MagicDefense'];
$lucky=$info['Lucky'];
$oldweapon=$info['WeaponId'];      //读取旧装备id和人物属性
if($oldweapon==''){                //没有旧装备
	$attack+=$effect;
	$defense+=$effect;
	$hit+=$effect;
	$miss+=$effect;
	$magicattack+=$effect;
	$magicdefense+=$effect;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET Attack = $attack,Defense=$defense,Hit=$hit,Miss=$miss,MagicAttack=$magicattack,MagicDefense=$magicdefense WHERE Name='$nam'");
	return 0;
	}
	
else
	{
	echo "<script>alert('宝具一旦装备就无法更换');</script>";
	}
}


function EquipDF($effect,$skillid,$touseid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$miss=$info['Miss'];
$lucky=$info['Lucky'];
$oldshoe=$info['ShoeId'];      //读取旧装备id和人物属性
if($oldshoe==''){                //没有旧装备
	$miss+=$effect;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET Miss = $miss,ShoeId = $touseid WHERE Name='$nam'");
	return 0;
	}
else
	{
	$result=mysql_query("SELECT * FROM itemset WHERE id='$oldshoe'"); 
	$info=mysql_fetch_array($result);
	$oldskill=$info['SkillID'];
	$oldeffect=$info['Effect'];         //读取旧装备属性
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newmiss=$miss-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Miss = $newmiss,ShoeId = $touseid WHERE Name='$nam'");                 //装备新装备
	return $oldshoe;                 //将旧装备放入背包
	}
}

function EquipDH($effect,$skillid,$touseid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$hit=$info['Hit'];
$lucky=$info['Lucky'];
$oldhelmet=$info['HelmetId'];      //读取旧装备id和人物属性
if($oldhelmet==''){                //没有旧装备
	$hit+=$effect;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET Hit = $hit,HelmetId = $touseid WHERE Name='$nam'");
	return 0;

	}
else
	{
	$result=mysql_query("SELECT * FROM itemset WHERE id='$oldhelmet'"); 
	$info=mysql_fetch_array($result);
	$oldskill=$info['SkillID'];
	$oldeffect=$info['Effect'];         //读取旧装备属性
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newhit=$hit-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Hit = $newhit,HelmetId = $touseid WHERE Name='$nam'");                 //装备新装备
	return $oldhelmet;                 //将旧装备放入背包
	}
}


function EquipDA($effect,$skillid,$touseid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$defense=$info['Defense'];
$lucky=$info['Lucky'];
$oldarmor=$info['ArmorId'];      //读取旧装备id和人物属性
echo $defense;
if($oldarmor==''){                //没有旧装备
	$defense+=$effect;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET Defense = $defense,ArmorId = $touseid WHERE Name='$nam'");
	return 0;

	}
else
	{
	$result=mysql_query("SELECT * FROM itemset WHERE id='$oldarmor'"); 
	$info=mysql_fetch_array($result);
	$oldskill=$info['SkillID'];
	$oldeffect=$info['Effect'];         //读取旧装备属性
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newdefense=$defense-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Defense = $newdefense,ArmorId = $touseid WHERE Name='$nam'");                 //装备新装备
	return $oldarmor;                 //将旧装备放入背包
	}
}

function EquipA($effect,$skillid,$touseid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$magicattack=$info['MagicAttack'];
$magicdefense=$info['MagicDefense'];
$lucky=$info['Lucky'];
$oldaccessories=$info['AccessoriesId'];      //读取旧装备id和人物属性
if($oldhelmet==''){                //没有旧装备
	$magicattack += $effect;
	$magicdefense += $effect;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET MagicAttack = $magicattack,MagicDefense = $magicdefense,AccessoriesId = $touseid WHERE Name='$nam'");
	return 0;

	}
else
	{
	$result=mysql_query("SELECT * FROM itemset WHERE id='$oldaccessories'"); 
	$info=mysql_fetch_array($result);
	$oldskill=$info['SkillID'];
	$oldeffect=$info['Effect'];         //读取旧装备属性
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newmagicattack=$magicattack-$oldeffect+$effect;
	$newmagicdefense=$magicdefense-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET MagicAttack = $newmagicattack,MagicDefense=$newmagicdefense,AccessoriesId = $touseid WHERE Name='$nam'");                 //装备新装备
	return $oldaccessories;                 //将旧装备放入背包
	}
}


function EquipTR($effect,$skillid,$touseid)
{
$nam=$_SESSION['User'];
include "../Connect.php";
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$roleskill=$info['Skills'];
$move=$info['Move'];
$lucky=$info['Lucky'];
$oldtransport=$info['TransportId'];      //读取旧装备id和人物属性
if($oldtransport==''){                //没有旧装备
	$move+=$effect;
	SkillLearn($skillid);
	mysql_query("UPDATE roleset SET Move = $move,TransportId = $touseid WHERE Name='$nam'");
	return 0;
	}
else
	{
	$result=mysql_query("SELECT * FROM itemset WHERE id='$oldtransport'"); 
	$info=mysql_fetch_array($result);
	$oldskill=$info['SkillID'];
	$oldeffect=$info['Effect'];         //读取旧装备属性
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newmove=$move-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Move = $newmove,TransportId = $touseid WHERE Name='$nam'");                 //装备新装备
	return $oldtransport;                 //将旧装备放入背包
	}
}



?>
