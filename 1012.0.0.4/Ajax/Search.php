<?php
include "../Connect.php";
$nam=$_GET["name"];

if($nam!='')
{
	mysql_select_db("db_1012", $con);
	$result=mysql_query("SELECT * FROM RoleSet WHERE Name='$nam'"); 
	$info=mysql_fetch_array($result);
	$fightvs=$info['FightVs'];
	if($fightvs!=NULL)
	{
		if($fightvs==0)
			echo '死人是不会动的唷~';	
		else
			Defend($nam);
	}
	else
	{
	$location=$info['Location'];
	srand((double)microtime()*1000000);
	$ran=rand(0,10000);
	if($ran=<5500)     //the probability of meeting people
	Meet($location,$info['Attitude']);
	if($ran>5500&&$ran<=9000) //the probability of picking up sth
	Pick($location);
	if($ran>9000&&$ran<=9999)
	Event($location);   //the probability of starting an event
	if($ran==10000)     //the probability of starting mission
	Mission($location);
	}
}
function Meet($lo,$Att)
{
	



}
?>
