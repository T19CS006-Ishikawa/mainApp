
<?php
$path = 'https://file-upload-app.herokuapp.com/';
/*
$fh = fopen($path, 'r');

while($sRec = fgets($fh)){
 //echo $sRec."<BR>";
}
fclose($fh);
*/
$c = file_get_contents($path);
echo $c;



?>
