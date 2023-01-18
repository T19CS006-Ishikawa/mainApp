<?php
$result = glob('./csvData/*.txt');
var_dump($result);
//１つだけ確認

echo "<br>";
$filename = 'https://app-for-lms.herokuapp.com/csvData/work1_status.txt';
    $txt = file_get_contents($filename);
   echo $txt;

?>