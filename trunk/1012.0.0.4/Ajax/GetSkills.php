﻿<?php
include "../Connect.php";
$nam=$_GET["name"];
if($nam!='')
		{
		mysql_select_db("db_1012", $con);
		$result=mysql_query("SELECT Skills FROM RoleSet WHERE Name='$nam'"); 
		$info=mysql_fetch_array($result);
		$Skills=$info[0];
		
		
		$Skillsid=explode(",",$Skills);
		$i=0;
		while($Skillsid[$i]!='')
			{
			$result=mysql_query("SELECT * FROM SkillSet WHERE Type='$Skillsid[$i]'"); 
			$info=mysql_fetch_array($result);
			$Skill[$i]['Name']=$info['Name'];
			$Skill[$i]['Type']=$info['Type'];
			$Skill[$i]['Description']=$info['Description'];
			$Skill[$i]['Level']=$info['Level'];
			$i++;
			}
	if($Skill[0]['Name']!=''){
		echo '<div id="S1" '.' onmouseover="S1HS();"	onMouseOut="S1HH();">&nbsp&nbsp'.$Skill[0]['Name'].'&nbsp&nbspLv.'.$Skill[0]['Level'].'</div>';
		echo '<div id="S1H" style="position: absolute;top:0%;left:40%;font-size:20%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[0]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S1">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S1H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}
		
	if($Skill[1]['Name']!=''){
		echo '<div id="S2"  '.' onmouseover="S2HS();"	onMouseOut="S2HH();">&nbsp&nbsp'.$Skill[1]['Name'].'&nbsp&nbspLv.'.$Skill[1]['Level'].'</div>';
		echo '<div id="S2H" style="position: absolute;top:5%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[1]['Description'].'</div>';
		echo '<br />';}

	else
		{
		echo '<div id="S2">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S2H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}


	if($Skill[2]['Name']!=''){

		echo '<div id="S3" '.' onmouseover="S3HS();"	onMouseOut="S3HH();">&nbsp&nbsp'.$Skill[2]['Name'].'&nbsp&nbspLv.'.$Skill[2]['Level'].'</div>';
		echo '<div id="S3H" style="position: absolute;top:10%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[2]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S3">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S3H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}



	if($Skill[3]['Name']!=''){

		echo '<div id="S4" '.' onmouseover="S4HS();"	onMouseOut="S4HH();">&nbsp&nbsp'.$Skill[3]['Name'].'&nbsp&nbspLv.'.$Skill[3]['Level'].'</div>';
		echo '<div id="S4H" style="position: absolute;top:15%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[3]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S4">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S4H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	
	if($Skill[4]['Name']!=''){

		echo '<div id="S5" '.' onmouseover="S5HS();"	onMouseOut="S5HH();">&nbsp&nbsp'.$Skill[4]['Name'].'&nbsp&nbspLv.'.$Skill[4]['Level'].'</div>';
		echo '<div id="S5H" style="position: absolute;top:20%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[4]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S5">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S5H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[5]['Name']!=''){

		echo '<div id="S6" '.' onmouseover="S6HS();"	onMouseOut="S6HH();">&nbsp&nbsp'.$Skill[5]['Name'].'&nbsp&nbspLv.'.$Skill[5]['Level'].'</div>';
		echo '<div id="S6H" style="position: absolute;top:25%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[5]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S6">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S6H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[6]['Name']!=''){

		echo '<div id="S7" '.' onmouseover="S7HS();"	onMouseOut="S7HH();">&nbsp&nbsp'.$Skill[6]['Name'].'&nbsp&nbspLv.'.$Skill[6]['Level'].'</div>';
		echo '<div id="S7H" style="position: absolute;top:30%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[6]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S7">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S7H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[7]['Name']!=''){

		echo '<div id="S8" '.' onmouseover="S8HS();"	onMouseOut="S8HH();">&nbsp&nbsp'.$Skill[7]['Name'].'&nbsp&nbspLv.'.$Skill[7]['Level'].'</div>';
		echo '<div id="S8H" style="position: absolute;top:35%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[7]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S8">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S8H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[8]['Name']!=''){

		echo '<div id="S9" '.' onmouseover="S9HS();"	onMouseOut="S9HH();">&nbsp&nbsp'.$Skill[8]['Name'].'&nbsp&nbspLv.'.$Skill[8]['Level'].'</div>';
		echo '<div id="S9H" style="position: absolute;top:40%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[8]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S9">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S9H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[9]['Name']!=''){

		echo '<div id="S10" '.' onmouseover="S10HS();"	onMouseOut="S10HH();">&nbsp&nbsp'.$Skill[9]['Name'].'&nbsp&nbspLv.'.$Skill[9]['Level'].'</div>';
		echo '<div id="S10H" style="position: absolute;top:45%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[9]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S10">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S10H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[10]['Name']!=''){

		echo '<div id="S11" '.' onmouseover="S11HS();"	onMouseOut="S11HH();">&nbsp&nbsp'.$Skill[10]['Name'].'&nbsp&nbspLv.'.$Skill[10]['Level'].'</div>';
		echo '<div id="S11H" style="position: absolute;top:50%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[10]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S11">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S11H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[11]['Name']!=''){

		echo '<div id="S12" '.' onmouseover="S12HS();"	onMouseOut="S12HH();">&nbsp&nbsp'.$Skill[11]['Name'].'&nbsp&nbspLv.'.$Skill[11]['Level'].'</div>';
		echo '<div id="S12H" style="position: absolute;top:55%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[11]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S12">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S12H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[12]['Name']!=''){

		echo '<div id="S13" '.' onmouseover="S13HS();"	onMouseOut="S3HH();">&nbsp&nbsp'.$Skill[12]['Name'].'&nbsp&nbspLv.'.$Skill[12]['Level'].'</div>';
		echo '<div id="S13H" style="position: absolute;top:60%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[12]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S13">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S13H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[13]['Name']!=''){

		echo '<div id="S14" '.' onmouseover="S14HS();"	onMouseOut="S14HH();">&nbsp&nbsp'.$Skill[13]['Name'].'&nbsp&nbspLv.'.$Skill[13]['Level'].'</div>';
		echo '<div id="S14H" style="position: absolute;top:65%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[13]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S14">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S14H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}

	if($Skill[14]['Name']!=''){

		echo '<div id="S15" '.' onmouseover="S15HS();"	onMouseOut="S15HH();">&nbsp&nbsp'.$Skill[14]['Name'].'&nbsp&nbspLv.'.$Skill[14]['Level'].'</div>';
		echo '<div id="S15H" style="position: absolute;top:70%;left:40%;font-size:10%;z-index:10;
">'.'&nbsp&nbsp描述：'.$Skill[14]['Description'].'</div>';
		echo '<br />';}
	else
		{
		echo '<div id="S15">'.'&nbsp&nbsp'.'</div>';
		echo '<div id="S15H">'.'&nbsp&nbsp'.'</div>';
		echo '<br />';}





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
