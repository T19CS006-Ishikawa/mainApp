<?php

$filename = 'https://app-for-lms.herokuapp.com/csvData/data.txt';
$print = file_get_contents($filename);

echo $print;

?>