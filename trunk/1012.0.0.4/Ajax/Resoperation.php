<?php
session_start();
require "Itemfunction.php";
require "Skillfunction.php";
$nam=$_SESSION['User'];
include "../Connect.php";
$dropid=$_GET["dropid"];
$useid=$_GET["useid"];
$unequipid=$_GET["unequipid"];
mysql_select_db("db_1012", $con);

if($dropid!='')
	{
	$result=mysql_query("SELECT Location FROM RoleSet WHERE Name='$nam'"); 
	$info=mysql_fetch_array($result);
	$local=$info[0];

	$dropname='Bag'.$dropid;
	$result0=mysql_query("UPDATE RoleSet SET $dropname = NULL WHERE Name='$nam'");
	$result1=mysql_query("UPDATE ItemSet SET $Location = $local WHERE Name='$nam'");
	}

if($unequipid!='')
	{
	$result=mysql_query("SELECT * FROM RoleSet WHERE Name='$nam'"); 
	
	$info=mysql_fetch_array($result);
	$oldattack=$info['Attack'];
	$olddefense=$info['Defense'];
	$oldhit=$info['Hit'];
	$oldmiss=$info['Miss'];
	$oldmagicattack=$info['MagicAttack'];
	$oldmagicdefense=$info['MagicDefense'];
	$oldmove=$info['Move'];
	$oldlucky=$info['Lucky'];
	if($unequipid==1)
		{
		$unequipid='HelmetId';
		$result=mysql_query("SELECT $unequipid FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$tmp=$info[0];
		$result=mysql_query("SELECT * FROM ItemSet WHERE id='$tmp'"); 
		$info=mysql_fetch_array($result);
		$oldskill=$info['SkillId'];
		$oldeffect=$info['Effect'];
		$oldLucky=$info['Lucky'];     
		SkillForget($oldskill);
		$new=$oldhit-$oldeffect;
		$newlucky=$oldlucky-$oldLucky;
		if(Put2Bag($tmp))
			$result0=mysql_query("UPDATE RoleSet SET $unequipid = NULL,Hit = $new,Lucky=$newlucky WHERE Name='$nam'");
		}
	if($unequipid==2)
		{
		$unequipid='ArmorId';
		$result=mysql_query("SELECT $unequipid FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$tmp=$info[0];
		$result=mysql_query("SELECT * FROM ItemSet WHERE id='$tmp'"); 
		$info=mysql_fetch_array($result);
		$oldskill=$info['SkillId'];
		$oldeffect=$info['Effect'];
		$oldLucky=$info['Lucky'];     
		SkillForget($oldskill);
		$newlucky=$oldlucky-$oldLucky;
		$new=$olddefense-$oldeffect;
		if(Put2Bag($tmp))
			$result0=mysql_query("UPDATE RoleSet SET $unequipid = NULL,Defense = $new,Lucky=$newlucky WHERE Name='$nam'");
		}
	if($unequipid==3)
		{
		$unequipid='ShoeId';
		$result=mysql_query("SELECT $unequipid FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$tmp=$info[0];
		$result=mysql_query("SELECT * FROM ItemSet WHERE id='$tmp'"); 
		$info=mysql_fetch_array($result);
		$oldskill=$info['SkillId'];
		$oldeffect=$info['Effect'];
		$oldLucky=$info['Lucky'];     
		SkillForget($oldskill);
		$newlucky=$oldlucky-$oldLucky;
		$new=$oldmiss-$oldeffect;
		if(Put2Bag($tmp))
			$result0=mysql_query("UPDATE RoleSet SET $unequipid = NULL,Miss = $new,Lucky = $newlucky WHERE Name='$nam'");
		}
	if($unequipid==4)                     //���ߵ��޷�ж�غ͸���
		{
		echo "<script>alert('�����޷�ж�ؼ�����');</script>";
		}
	if($unequipid==5)
		{
		$unequipid='TransportId';
		$result=mysql_query("SELECT $unequipid FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$tmp=$info[0];
		$result=mysql_query("SELECT * FROM ItemSet WHERE id='$tmp'"); 
		$info=mysql_fetch_array($result);
		$oldskill=$info['SkillId'];
		$oldeffect=$info['Effect'];
		$oldLucky=$info['Lucky'];     
		SkillForget($oldskill);
		$newlucky=$oldlucky-$oldLucky;
		$new=$oldmove-$oldeffect;
		if(Put2Bag($tmp))
			$result0=mysql_query("UPDATE RoleSet SET $unequipid = NULL,Move = $new,Lucky = $newlucky WHERE Name='$nam'");
		}
	if($unequipid==6)
		{
		$unequipid='AccessoriesId';
		$result=mysql_query("SELECT $unequipid FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$tmp=$info[0];
		$result=mysql_query("SELECT * FROM ItemSet WHERE id='$tmp'"); 
		$info=mysql_fetch_array($result);
		$oldskill=$info['SkillId'];
		$oldeffect=$info['Effect'];
		$oldLucky=$info['Lucky'];    
		SkillForget($oldskill);
		$newlucky=$oldlucky-$oldLucky;
		$newa=$oldmagicattack-$oldeffect;
		$newb=$oldmagicdefense-$oldeffect;
		if(Put2Bag($tmp))
			$result0=mysql_query("UPDATE RoleSet SET $unequipid = NULL,MagicAttack = $newa ,MagicDefense = $newb,Lucky = $newlucky WHERE Name='$nam'");
		}
	if($unequipid==7)
		{
		$unequipid='WeaponId';
		$result=mysql_query("SELECT $unequipid FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$tmp=$info[0];
		$result=mysql_query("SELECT * FROM ItemSet WHERE id='$tmp'"); 
		$info=mysql_fetch_array($result);
		$oldskill=$info['SkillId'];
		$oldeffect=$info['Effect'];
		$oldLucky=$info['Lucky'];     
		SkillForget($oldskill);
		$newlucky=$oldlucky-$oldLucky;
		$new=$oldattack-$oldeffect;
		if(Put2Bag($tmp))
			$result0=mysql_query("UPDATE RoleSet SET $unequipid = NULL,Attack = $new,Lucky = $newlucky WHERE Name='$nam'");
		}
	}


if($useid!='')
	{
	$usename='Bag'.$useid;
	$result=mysql_query("SELECT $usename FROM RoleSet WHERE Name='$nam'");
	$info=mysql_fetch_array($result);
	$touseid=$info[0];
	$result=mysql_query("SELECT * FROM ItemSet WHERE id='$touseid'");
	$info=mysql_fetch_array($result);
	$type=$info['Type'];
	$effect=$info['Effect'];
	$durable=$info['Durable'];
	$skillid=$info['SkillId'];   
	$Lucky=$info['Lucky'];    //item��location�������е�״̬Ϊ0
	echo $type;
	switch ($type)
		{
		case 'HH':                        //�����ظ�
			Heal($effect,$durable);
			$durable--;
			if($durable==0)
				{$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");}
			else
				{$result0=mysql_query("UPDATE ItemSet SET Durable = $durable WHERE id='$touseid'");}
			break;
		case 'PH':                         //���ö���
			Poison($effect,$durable,$Lucky);
			$durable--;
			if($durable==0)
				{$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");}
			else
				{$result0=mysql_query("UPDATE ItemSet SET Durable = $durable WHERE id='$touseid'");}
			break;
		case 'T':                        //�������� ����Special������δ����Ϊnull,��npc����Ϊ0������ҿ�����Ϊ���id
			Trap($touseid);
			$durable--;
			if($durable==0)
				{$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");}
			else
				{$result0=mysql_query("UPDATE ItemSet SET Durable = $durable WHERE id='$touseid'");}
			break;
		case 'X':
			Fail();
			break;
		case 'Z':
			Fail();
			break;
		case 'Gp':
			Lord($effect,$durable,$type,$skillid);
			break;
		case 'V':
			Learn($skillid);
			$durable--;
			if($durable==0)
				{$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");}
			else
				{$result0=mysql_query("UPDATE ItemSet SET Durable = $durable WHERE id='$touseid'");}
			break;
		case 'P':
			Open($durable);
			if($durable==0)
				{$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");}
			else
				{$result0=mysql_query("UPDATE ItemSet SET Durable = $durable WHERE id='$touseid'");}
			break;
		case 'WK':
			$t=EquipW($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'WC':
			$t=EquipW($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'WG':
			
			$t=EquipW($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'WS':
			
			$t=EquipW($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'WD':
				
			$t=EquipW($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'T':	
			$t=EquipT($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'DF':
			
			$t=EquipDF($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'DA':
			
			$t=EquipDA($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'DH':
					
			$t=EquipDH($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}			
			break;
		case 'A':
				
			$t=EquipA($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		case 'TR':	
			$t=EquipTR($effect,$skillid,$touseid);
			$result0=mysql_query("UPDATE RoleSet SET $usename = NULL WHERE Name='$nam'");
			if($t)
				{Put2Bag($t);}
			break;
		}
	}



?>