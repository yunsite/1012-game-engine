<?php
include "../Connect.php";
$nam=$_GET["name"];

if($nam!='')
{
	mysql_select_db("db_1012", $con);
	$result=mysql_query("SELECT * FROM roleset WHERE Name='$nam'"); 
	$info=mysql_fetch_array($result);
	$Bag1=$info['Bag1'];
	$Bag2=$info['Bag2'];
	$Bag3=$info['Bag3'];
	$Bag4=$info['Bag4'];
	$Bag5=$info['Bag5'];
	

	$result=mysql_query("SELECT * FROM itemset WHERE id='$Bag1'"); 
	$info=mysql_fetch_array($result);
	$Bag1=array($info['Name'],$info['id']);

	$result=mysql_query("SELECT * FROM itemset WHERE id='$Bag2'"); 
	$info=mysql_fetch_array($result);
	$Bag2=array($info['Name'],$info['id']);

	$result=mysql_query("SELECT * FROM itemset WHERE id='$Bag3'"); 
	$info=mysql_fetch_array($result);
	$Bag3=array($info['Name'],$info['id']);

	$result=mysql_query("SELECT * FROM itemset WHERE id='$Bag4'"); 
	$info=mysql_fetch_array($result);
	$Bag4=array($info['Name'],$info['id']);

	$result=mysql_query("SELECT * FROM itemset WHERE id='$Bag5'"); 
	$info=mysql_fetch_array($result);
	$Bag5=array($info['Name'],$info['id']);
	if($Bag1[1]=='')
		{$Bag1[1]=0;}
	if($Bag2[1]=='')
		{$Bag2[1]=0;}
	if($Bag3[1]=='')
		{$Bag3[1]=0;}
	if($Bag4[1]=='')
		{$Bag4[1]=0;}
	if($Bag5[1]=='')
		{$Bag5[1]=0;}
	echo '<div id="Synthesisinfo" style="text-align:left;position: absolute;top:1%;left:32%;color:#fff;z-index:10;">'.'请拖动素材到魔法阵，再点击合成按钮'.'</div>';
	if($Bag1[1]!=0){
		echo '<div id="Bag1Sy" draggable="true" ondragstart="drag(event)" style="text-align:left;position: absolute;top:30%;left:0%;border:#fff solid;z-index:10;color:#fff;"onclick="SynAdd1()">'.$Bag1[0].'</div>'.'<div id="Bag1syid" style="display:none;">'.$Bag1[1].'</div>';}
	if($Bag2[1]!=0){
		echo '<div id="Bag2Sy" draggable="true" ondragstart="drag(event)" style="text-align:left;position: absolute;
top:40%;border:#fff solid;left:0%;z-index:10;color:#fff;" onclick="SynAdd2()">'.$Bag2[0].'</div>'.'<div id="Bag2syid" style="display:none;">'.$Bag2[1].'</div>';}
	if($Bag3[1]!=0){

		echo '<div id="Bag3Sy" draggable="true" ondragstart="drag(event)" style="text-align:left;position: absolute;
top:50%;border:#fff solid;left:0%;z-index:10;color:#fff;"onclick="SynAdd3()">'.$Bag3[0].'</div>'.'<div id="Bag3syid" style="display:none;">'.$Bag3[1].'</div>';}
	if($Bag4[1]!=0){

		echo '<div id="Bag4Sy" draggable="true" ondragstart="drag(event)" style="text-align:left;position: absolute;
top:60%;border:#fff solid;left:0%;z-index:10;color:#fff;"onclick="SynAdd4()">'.$Bag4[0].'</div>'.'<div id="Bag4syid" style="display:none;">'.$Bag4[1].'</div>';}
	if($Bag5[1]!=0){

		echo '<div id="Bag5Sy" draggable="true" ondragstart="drag(event)" style="text-align:left;position: absolute;
top:70%;border:#fff solid;left:0%;z-index:10;color:#fff;" onclick="SynAdd5()">'.$Bag5[0].'</div>'.'<div id="Bag5syid" style="display:none;">'.$Bag5[1].'</div>';}

		echo '<br /><img src="Image/Synthesis.jpg" ondrop="drop(event)"
ondragover="allowDrop(event)" alt="魔法阵" style="position: absolute;top:0%;left:0%;z-index:0;" \/>';

		echo '<br /><img id="chain1" src="Image/chain.png" style="position: absolute;top:5.5%;left:27.5%;z-index:0;display:none;" \/>';

		echo '<br /><img id="chain2" src="Image/chain.png" style="position: absolute;top:5.5%;left:55%;z-index:0;display:none;" \/>';

		echo '<br /><img id="chain3" src="Image/chain.png" style="position: absolute;top:45%;left:19%;z-index:0;display:none;" \/>';

		echo '<br /><img id="chain4" src="Image/chain.png" style="position: absolute;top:45.5%;left:64%;z-index:0;display:none;" \/>';

		echo '<br /><img id="chain5" src="Image/chain.png" style="position: absolute;top:70%;left:41.7%;z-index:0;display:none;" \/>';


		echo '<button type="button" id="SynthesisSubmit" style="position: absolute;top:80%;left:80%;" class="button" onclick="SynSubmit();">合成</button>';
}


?>