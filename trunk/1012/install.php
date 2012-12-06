<?php
include"Connect.php";
mysql_select_db("1012", $con);

$sql = "CREATE TABLE UserSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Password varchar(20)  NOT NULL,
Email varchar(30)  NOT NULL,
Name varchar(20)  NOT NULL,
Money int(8)  NOT NULL,
Score int(8)  NOT NULL,
Safe  varchar(10)  NOT NULL,
UNIQUE (Name)
)";
mysql_query($sql,$con);
if($con)
{echo "UserSet Install successfully!";}


$sql = "CREATE TABLE RoleSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Name nvarchar(20)  NOT NULL,
Exp int(8)  NOT NULL,
Level int(8)  NOT NULL,
Strength int(8)  NOT NULL,
Agility int(8)  NOT NULL,
Endurance int(8)  NOT NULL,
Magic int(8)  NOT NULL,
TrumpAbility int(8)  NOT NULL,
Money int(8)  NOT NULL,
Status nvarchar(4000)  NOT NULL,
Kills int(8)  NOT NULL,
Attitude nvarchar(4)  NOT NULL,
Contribution int(8)  NOT NULL,
UserId int(8)  NOT NULL,
Attack int(8)  NOT NULL,
Defense int(8)  NOT NULL,
Hit int(8)  NOT NULL,
Miss int(8)  NOT NULL,
Move int(8)  NOT NULL,
Health int(8)  NOT NULL,
StrengthPower int(8)  NOT NULL,
MagicAttack int(8)  NOT NULL,
MagicDefense int(8)  NOT NULL,
MaxHealth int(8)  NOT NULL,
MaxStrengthPower int(8)  NOT NULL,
LastWord nvarchar(30)  NOT NULL,
KillWord nvarchar(30)  NOT NULL,
TitleId int(8)  NOT NULL,
ArmorId int(8)  NULL,
HelmetId int(8)  NULL,
ShoeId int(8)  NULL,
TrumpId int(8)  NULL,
TransportId int(8)  NULL,
AccessoriesId int(8)  NULL,
WeaponId int(8)  NULL,
PracticeId int(8)  NOT NULL
)";
mysql_query($sql,$con);
if($con)
	echo "RoleSet Install successfully!";


$sql = "CREATE TABLE PracticeSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
SwordPractice int(8)  NOT NULL,
CastingPractice int(8)  NOT NULL,
ShootingPractice int(8)  NOT NULL,
WandPractice int(8)  NOT NULL,
AmuletPractice int(8)  NOT NULL,
MagicSwordPractice int(8)  NOT NULL
)";
mysql_query($sql,$con);
if($con)
	echo "PracticeSet Install successfully!";


$sql = "CREATE TABLE ItemSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Type nvarchar(4)  NOT NULL,
Effect int(8)  NOT NULL,
Durable int(8)  NOT NULL,
Name nvarchar(30)  NOT NULL,
Location int(8)  NOT NULL,
SkillId int(8)  NULL,
Description nvarchar(100)  NOT NULL
)";
mysql_query($sql,$con);
if($con)
	echo "ItemSet Install successfully!";


$sql = "CREATE TABLE LocationSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Name nvarchar(20)  NOT NULL,
Attribution nvarchar(8)  NULL,
Building nvarchar(20)  NOT NULL
)";
mysql_query($sql,$con);
if($con)
	echo "LocationSet Install successfully!";



$sql = "CREATE TABLE SkillSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Name nvarchar(30)  NOT NULL,
Type nvarchar(4)  NOT NULL,
Description nvarchar(100)  NOT NULL
)";
mysql_query($sql,$con);
if($con)
	echo "SkillSet Install successfully!";

$sql = "CREATE TABLE EventSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Name nvarchar(30)  NOT NULL,
RewardExp int(8)  NULL,
RewardMoney int(8)  NULL
)";
mysql_query($sql,$con);
if($con)
	echo "EventSet Install successfully!";


$sql = "CREATE TABLE AchievementSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
Name nvarchar(30)  NOT NULL,
Description nvarchar(100)  NOT NULL,
Title nvarchar(40)  NULL
)";
mysql_query($sql,$con);
if($con)
	echo "AchievementSet Install successfully!";


$sql = "CREATE TABLE GameLogSet (
id int(8) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
StartTime datetime  NOT NULL,
OverTime datetime  NOT NULL,
Winner nvarchar(30)  NOT NULL,
Ending nvarchar(10)  NOT NULL,
Amount int(8)  NOT NULL,
Title nvarchar(40)  NOT NULL
)";
mysql_query($sql,$con);
if($con)
	echo "GameLogSet Install successfully!";
?>
