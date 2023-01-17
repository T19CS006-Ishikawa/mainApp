<?php

$print = fopen("./csvData/data.txt","r");
$name = fgets($print);
echo $name;

?>