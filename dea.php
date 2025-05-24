<?php

$filename = $_GET["extact"];
$match = trim($_GET["mid"]);

$lines = explode("\n",file_get_contents($filename));
$i = 0;
file_put_contents($_GET["extact"],"");
foreach ($lines as $line) {
    $i = $i + 1;
    echo(trim($line) . "<br>");
    $line = trim($line);
    if ($line == $match) {
        echo("Goodbye, $line!<br>");
    } else {
        $fstream = fopen($filename,"a");
        fwrite($fstream,"$line\n");
        fclose($fstream);
    }
}