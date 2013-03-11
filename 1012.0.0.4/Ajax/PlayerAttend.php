<?php
include "../Connect.php";
mysql_select_db("db_1012", $con);
$att=$_GET["att"];
$result=mysql_query("SELECT Name FROM RoleSet WHERE Attitude='$att'"); 
$i=1;
echo '当前参加的玩家有：&nbsp&nbsp&nbsp&nbsp<br />';

while($info=mysql_fetch_array($result))
	{echo $info[0].'&nbsp&nbsp&nbsp&nbsp';
	if($i%4==0)
		{echo '<br />';}
	$i++;
	}
?>
