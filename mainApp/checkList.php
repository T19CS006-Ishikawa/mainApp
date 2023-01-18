<?php

//$filename = 'https://app-for-lms.herokuapp.com/csvData/status.txt';
//$print = file_get_contents($filename);
//echo $print;

$read =  glob('https://app-for-lms.herokuapp.com/csvData/*');
var_dump($read);

?>