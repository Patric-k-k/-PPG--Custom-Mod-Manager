<?php

$extact = $_GET["extact"];
$extstr = fopen($extact,"a");
$MID = $_GET["mid"];
fwrite($extstr,"\n$MID");
fclose($extstr);