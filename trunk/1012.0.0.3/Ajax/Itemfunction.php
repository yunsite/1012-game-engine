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
//������Լ����ж��¶����Ƿ�����ǿ����
if(($health-$effect)>0)
	{$newhealth=$health-$effect;
	$result0=mysql_query("UPDATE roleset SET Health = $newhealth WHERE Name='$nam'");
	}
else
	{Death($special,'Posuin');}     //����������һ���������¶���id
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
echo "<script>alert('���ڵ�ʱ������');</script>";
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
	{echo "<script>alert('Ҫװ�ӵ����ܵ���װ��ǹ�ɣ�');</script>";}
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

//�����Ժ���д��

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
$oldweapon=$info['WeaponId'];      //��ȡ��װ��id����������
if($oldweapon==''){                //û�о�װ��
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
	$oldeffect=$info['Effect'];         //��ȡ��װ������
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newattack=$attack-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Attack = $newattack,WeaponId = $touseid WHERE Name='$nam'");                 //װ����װ��
	return $oldweapon;                 //����װ�����뱳��
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
$oldweapon=$info['WeaponId'];      //��ȡ��װ��id����������
if($oldweapon==''){                //û�о�װ��
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
	echo "<script>alert('����һ��װ�����޷�����');</script>";
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
$oldshoe=$info['ShoeId'];      //��ȡ��װ��id����������
if($oldshoe==''){                //û�о�װ��
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
	$oldeffect=$info['Effect'];         //��ȡ��װ������
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newmiss=$miss-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Miss = $newmiss,ShoeId = $touseid WHERE Name='$nam'");                 //װ����װ��
	return $oldshoe;                 //����װ�����뱳��
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
$oldhelmet=$info['HelmetId'];      //��ȡ��װ��id����������
if($oldhelmet==''){                //û�о�װ��
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
	$oldeffect=$info['Effect'];         //��ȡ��װ������
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newhit=$hit-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Hit = $newhit,HelmetId = $touseid WHERE Name='$nam'");                 //װ����װ��
	return $oldhelmet;                 //����װ�����뱳��
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
$oldarmor=$info['ArmorId'];      //��ȡ��װ��id����������
echo $defense;
if($oldarmor==''){                //û�о�װ��
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
	$oldeffect=$info['Effect'];         //��ȡ��װ������
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newdefense=$defense-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Defense = $newdefense,ArmorId = $touseid WHERE Name='$nam'");                 //װ����װ��
	return $oldarmor;                 //����װ�����뱳��
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
$oldaccessories=$info['AccessoriesId'];      //��ȡ��װ��id����������
if($oldhelmet==''){                //û�о�װ��
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
	$oldeffect=$info['Effect'];         //��ȡ��װ������
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newmagicattack=$magicattack-$oldeffect+$effect;
	$newmagicdefense=$magicdefense-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET MagicAttack = $newmagicattack,MagicDefense=$newmagicdefense,AccessoriesId = $touseid WHERE Name='$nam'");                 //װ����װ��
	return $oldaccessories;                 //����װ�����뱳��
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
$oldtransport=$info['TransportId'];      //��ȡ��װ��id����������
if($oldtransport==''){                //û�о�װ��
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
	$oldeffect=$info['Effect'];         //��ȡ��װ������
	SkillForget($oldskill);
	SkillLearn($skillid);
	$newmove=$move-$oldeffect+$effect;
	mysql_query("UPDATE roleset SET Move = $newmove,TransportId = $touseid WHERE Name='$nam'");                 //װ����װ��
	return $oldtransport;                 //����װ�����뱳��
	}
}



?>