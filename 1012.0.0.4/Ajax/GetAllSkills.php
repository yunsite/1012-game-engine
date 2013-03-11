<?php
session_start();
include "../Connect.php";
$nam=$_SESSION['User'];
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT Major FROM RoleSet WHERE Name=$nam"); 
$info=mysql_fetch_array($result);
$skilllearned=$info[0];
$result=mysql_query("SELECT * FROM SkillSet GROUP by Type "); 
$info=mysql_fetch_array($result);
$i=0;




?>
