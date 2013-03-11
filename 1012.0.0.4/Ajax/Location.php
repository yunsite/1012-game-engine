<?php
session_start();
$nam=$_SESSION['User'];
$cd=$_SESSION['cd'];
$now=time();
if($now-$cd<60)
	{
		echo 0;
		exit();
	}
$_SESSION['cd']=$now;
include "../Connect.php";
mysql_select_db("db_1012", $con);
$location=$_GET["locationid"];

$result=mysql_query("SELECT * FROM RoleSet WHERE Name='$nam'");
$info=mysql_fetch_array($result);
$move=$info['Move'];
$oldlocation=$info['LocationId'];

$result=mysql_query("SELECT * FROM LocationSet WHERE id='$location'");
$info=mysql_fetch_array($result);
$neighbour=$info['Neighbour'];
$att=$info['Attribution'];
if($att==3)
	{$forbid=1;}
else
	{$forbid=0;}
$neighbours=explode(',',$neighbour);
$flag=0;
$i=0;
while($neighbours[$i]!='')
	{if($oldlocation==$neighbours[$i])
		{$flag=1;}
	$i++;
	}
//当移动力为1时，只能前往邻居点，移动力为2时可以去禁区，移动力为3是可以随意移动（除15区），移动力大于10时是黄金之心的效果，随机移动，可能到达15区

if($move>10)
{
$ran=rand(1,15);
mysql_query("UPDATE RoleSet SET LocationId = $ran WHERE Name='$nam'"); 
echo $ran;
exit();
}


if($flag==1&&$forbid==0)          //是邻居且不是禁区
{
	mysql_query("UPDATE RoleSet SET LocationId = $location WHERE Name='$nam'"); 
	echo $location;
	exit();
}

if($move==2&&$flag==1)
{
	mysql_query("UPDATE RoleSet SET LocationId = $location WHERE Name='$nam'"); 
	echo $location;
	exit();
}

if($move>=3&&$move<10)                            
{
	mysql_query("UPDATE RoleSet SET LocationId = $location WHERE Name='$nam'"); 
	echo $location;
	exit();
}



echo 0;
?>
