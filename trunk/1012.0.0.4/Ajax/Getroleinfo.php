<?php
include "../Connect.php";
$nam=$_GET["name"];
if($nam!='')
		{
		mysql_select_db("db_1012", $con);
		$result=mysql_query("SELECT * FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$TitleId=$info['TitleId'];
		$Exp=$info['Exp'];
		$Level=$info['Level'];
		$Strength=$info['Strength'];
		$Agility=$info['Agility'];
		$Endurance=$info['Endurance'];
		$Magic=$info['Magic'];
		$TrumpAbility=$info['TrumpAbility'];
		$Money=$info['Money'];
		$Status=$info['Status'];
		$Attack=$info['Attack'];
		$Defense=$info['Defense'];
		$Hit=$info['Hit'];
		$Miss=$info['Miss'];
		$Move=$info['Move'];
		$Kills=$info['Kills'];
		$Contribution=$info['Contribution'];
		$MagicAttack=$info['MagicAttack'];
		$MagicDefense=$info['MagicDefense'];
		$Health=$info['Health'];
		$MaxHealth=$info['MaxHealth'];
		$Strength=Trans($Strength);
		$Agility=Trans($Agility);
		$Endurance=Trans($Endurance);
		$Magic=Trans($Magic);
		$TrumpAbility=Trans($TrumpAbility);

		$result=mysql_query("SELECT Title FROM AchievementSet WHERE id='$TitleId'");
		$info2=mysql_fetch_array($result);
		$Title=$info2[0];

		echo'<p class=role>';
		echo $Title.'&nbsp&nbsp&nbsp'.$nam.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp击杀：'.$Kills.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp贡献：'.$Contribution.'<br />经验：'.$Exp.'&nbsp&nbsp&nbsp等级：'.$Level.'&nbsp&nbsp&nbsp金钱：'.$Money.'&nbsp&nbsp&nbsp状态：'.$Status.'<br />';
		echo '力量：'.$Strength.'&nbsp&nbsp&nbsp敏捷：'.$Agility.'&nbsp&nbsp&nbsp耐力：'.$Endurance.'&nbsp&nbsp&nbsp魔力：'.$Magic.'&nbsp&nbsp&nbsp宝具：'.$TrumpAbility.'<br />';
		echo '攻击：'.$Attack.'&nbsp&nbsp&nbsp防御：'.$Defense.'&nbsp&nbsp&nbsp命中：'.$Hit.'&nbsp&nbsp&nbsp回避：'.$Miss.'&nbsp&nbsp&nbsp移动：'.$Move.'&nbsp&nbsp&nbsp属性攻击：'.$MagicAttack.'&nbsp&nbsp&nbsp属性防御：'.$MagicDefense.'<br />';
		echo '生命值：'.$Health.'/'.$MaxHealth.'</p>';
		
		}



function Trans($number)
{
switch($number){
	case 0:
		{return 'F';}
	case 1:
		{return 'E';}
	case 2:
		{return 'D';}
	case 3:
		{return 'C';}
	case 4:
		{return 'B';}
	case 5:
		{return 'A';}
	case 6:
		{return 'S';}
	case 7:
		{return 'EX';}
	default:
		{return '';}
	}
}
?>
