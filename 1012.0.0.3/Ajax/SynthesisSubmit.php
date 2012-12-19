<?php
session_start();
require "Itemfunction.php";
$nam=$_SESSION['User'];
include "../Connect.php";
$ids=$_GET["m"];
$idarray=explode(",",$ids);
mysql_select_db("db_1012", $con);
$result0=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
$info=mysql_fetch_array($result0);
$Bag1=$info['Bag1'];
$Bag2=$info['Bag2'];
$Bag3=$info['Bag3'];
$Bag4=$info['Bag4'];
$Bag5=$info['Bag5'];

if($idarray[0]!='')
	{$ida1='{'.$idarray[0].'}';}
if($idarray[1]!='')
	{$ida2='{'.$idarray[1].'}';}
if($idarray[2]!='')
	{$ida3='{'.$idarray[2].'}';}
if($idarray[3]!='')
	{$ida4='{'.$idarray[3].'}';}
if($idarray[4]!='')
	{$ida5='{'.$idarray[4].'}';}

$i=0;
$j=0;
$fl=0;
$Syn = file("../GameData/Synthesis.txt");

if($ida2==''||$ida1==''){		echo '<br /><br /><br />';
	exit('合成失败！');
}   //至少应传入两个值
while($Syn[$i]!='')      //将匹配第一个值的存到result数组
		{
		$count = substr_count($Syn[$i],$ida1);
		if($count!=0)
			{
				$result[$j]=$Syn[$i];
				$j++;
			}
		$i++;
		}

for($i=0;$i<$j;$i++)    //用第二个值对result进行过滤
		{
		$count = substr_count($result[$i],$ida2);
		if($count==0)
			{
				$result[$i]='';
			}
		}

if($ida3!='')    //如果有两个以上值再次过滤
	{
		for($i=0;$i<$j;$i++)
		{
			$count = substr_count($result[$i],$ida3);
			if($count==0)
			{
				$result[$i]='';
			}
		}
	
	}

else        //仅有两个值则用加号过滤
	{
		for($i=0;$i<$j;$i++)
		{
			$count = substr_count($result[$i],'+');
			if($count!=1)
			{
				$result[$i]='';
			}
		}
		for($i=0;$i<2;$i++)
		{
		
		if($idarray[$i]==$Bag1)
			{$flag[$i]='Bag1';}
		if($idarray[$i]==$Bag2)
			{$flag[$i]='Bag2';}
		if($idarray[$i]==$Bag3)
			{$flag[$i]='Bag3';}
		if($idarray[$i]==$Bag4)
			{$flag[$i]='Bag4';}
		if($idarray[$i]==$Bag5)
			{$flag[$i]='Bag5';}
		}
		$fl=1;
	}

if($ida4!='')       //有三个以上值
	{
		for($i=0;$i<$j;$i++)
		{
			$count = substr_count($result[$i],$ida4);
			if($count==0)
			{
				$result[$i]='';
			}
		}
	
	}
elseif($fl==0)     //仅有三个值
	{
		for($i=0;$i<$j;$i++)
		{
			$count = substr_count($result[$i],'+');
			if($count!=2)
			{
				$result[$i]='';
			}
		}
		for($i=0;$i<3;$i++)
		{
		if($idarray[$i]==$Bag1)
			{$flag[$i]='Bag1';}
		if($idarray[$i]==$Bag2)
			{$flag[$i]='Bag2';}
		if($idarray[$i]==$Bag3)
			{$flag[$i]='Bag3';}
		if($idarray[$i]==$Bag4)
			{$flag[$i]='Bag4';}
		if($idarray[$i]==$Bag5)
			{$flag[$i]='Bag5';}
		}
		$fl=1;
	}

if($ida5!=''&&$fl==0)     //有五个值
	{
		for($i=0;$i<$j;$i++)
		{
			$count = substr_count($result[$i],$ida5);
			if($count==0)
			{
				$result[$i]='';
			}
		}
		for($i=0;$i<5;$i++)
		{
		if($idarray[$i]==$Bag1)
			{$flag[$i]='Bag1';}
		if($idarray[$i]==$Bag2)
			{$flag[$i]='Bag2';}
		if($idarray[$i]==$Bag3)
			{$flag[$i]='Bag3';}
		if($idarray[$i]==$Bag4)
			{$flag[$i]='Bag4';}
		if($idarray[$i]==$Bag5)
			{$flag[$i]='Bag5';}
		}
	}	

elseif($fl==0)               //有四个值
	{
		for($i=0;$i<$j;$i++)
		{
			$count = substr_count($result[$i],'+');
			if($count!=3)
			{
				$result[$i]='';
			}
		}
		for($i=0;$i<4;$i++)
		{
		if($idarray[$i]==$Bag1)
			{$flag[$i]='Bag1';}
		if($idarray[$i]==$Bag2)
			{$flag[$i]='Bag2';}
		if($idarray[$i]==$Bag3)
			{$flag[$i]='Bag3';}
		if($idarray[$i]==$Bag4)
			{$flag[$i]='Bag4';}
		if($idarray[$i]==$Bag5)
			{$flag[$i]='Bag5';}
		}
		$fl=1;
	}
	

$f=0;
for($i=0;$i<$j;$i++)
		{
			if($result[$i]!='')
			{
			$final[$f]=$result[$i];
			$f++;
			}
		}
if($final[0]!=''&&$final[1]==''){
		$s=explode("=",$final[0]);
		$i=0;
		while($flag[$i]!='')
			{$result0=mysql_query("UPDATE roleset SET $flag[$i] = NULL WHERE Name='$nam'"); 
			$i++;}
		Put2Bag($s[1]);
		echo '<br /><br /><br />合成成功！';	
}
else
{		echo '<br /><br /><br />合成失败！';
}

?>
