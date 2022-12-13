
<?php
$path = 'https://file-upload-app.herokuapp.com/list.txt';
$fh = fopen($path, 'r');
$df = fgets($fh);

while($sRec = fgets($fh)){
    
 echo $sRec."<BR>";

}

fclose($fh);

?>
