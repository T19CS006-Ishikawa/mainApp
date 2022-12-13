
<?php
$path = 'getFileName.php';
$fh = fopen('https://file-upload-app.herokuapp.com/'.$path, 'r');


while($sRec = fgets($fh))

{
 echo $sRec."<BR>";
}

fclose($fh);

?>
