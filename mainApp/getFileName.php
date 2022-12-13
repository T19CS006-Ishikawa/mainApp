
<?php
$path = 'https://file-upload-app.herokuapp.com/getFileName.php';
$fh = fopen($path, 'r');

while($sRec = fgets($fh)){
 //echo $sRec."<BR>";
}
$c = file_get_contents($path);
echo $c;

fclose($fh);

?>
