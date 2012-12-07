<?php
$xml = simplexml_load_file("GameData/Achievement.xml");
echo $xml->Achievement[1]->Name;
?>