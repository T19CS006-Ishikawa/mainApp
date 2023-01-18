<?php
$result = glob('./csvData/*.txt');
//１つだけ確認
$filename = 'https://app-for-lms.herokuapp.com/csvData/work1_status.txt';
    $txt = file_get_contents($filename);
   echo $txt;

?>