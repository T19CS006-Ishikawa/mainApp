
<?php
$path = 'https://file-upload-app.herokuapp.com/getFileName.php';
$fh = fopen($path, 'r');
$df = fgets($fh);
echo $df."<BR>";
/*
while($sRec = fgets($fh))

{
 echo $sRec."<BR>";
}
*/
fclose($fh);

?>
