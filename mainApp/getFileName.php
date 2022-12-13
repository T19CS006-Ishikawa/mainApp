
<?php
$path = 'https://file-upload-app.herokuapp.com/getFileName.php';
$fh = fopen($path, 'r');
$df = fgets($fh);

while($sRec = fgets($fh)){
    
 echo $sRec;
 break;
}

fclose($fh);

?>
