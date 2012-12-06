<?php
$con = mysql_connect("127.0.0.1","root","decode~U");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("set names 'UTF8'");
?>