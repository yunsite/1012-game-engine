<?php
session_start();
include "../Connect.php";
$nam=$_SESSION['User'];
mysql_select_db("db_1012", $con);
$result=mysql_query("SELECT Attribution FROM RoleSet WHERE Name='$nam'"); 
$info=mysql_fetch_array($result);
$att=$info[0];
$result=mysql_query("SELECT * FROM RoleSet WHERE Attribution='$att'"); 
$info=mysql_fetch_array($result);




?>
