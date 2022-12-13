
<?php
$path = 'https://file-upload-app.herokuapp.com/getFileName.php';
$fh = fopen($path, 'r');
$data;
$count= 0;
while($cFile = fgets($fh)){
    $data[count] = $cFile;
    $count++;
}
$eCount = 0;
while($eCount!=$count){
    echo $data[$eCount];
}
/*
while($sRec = fgets($fh))

{
 echo $sRec."<BR>";
}
*/
fclose($fh);

?>
