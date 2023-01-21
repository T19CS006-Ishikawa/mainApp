<?php 
    $path = 'https://app-for-lms.herokuapp.com/';
    $getFileName = $path.'getFileName.php';
    $getCSV = $path.'getCSV.php';
    $checkStatus = $path.'checkStatus.php';
    
    file_get_contents($getFileName);
    file_get_contents($getCSV);
    file_get_contents($checkStatus);

?>