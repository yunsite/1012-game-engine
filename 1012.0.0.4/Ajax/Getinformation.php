﻿<?php
$atti=$_GET["a"];
$xmlinfo = simplexml_load_file("../GameInfo.xml");
$content=$xmlinfo->content;
echo '<br /><br /><br />';
echo '世界线'.'<br />';
echo $content;


?>
