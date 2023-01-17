
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
echo $c;
$fp = "mainList.txt";
//mainApp内にtxtを実質コピーする
$handle =  fopen($fp,"w");
    fputs($handle,$c);
fclose($handle);

$read = file_get_contents($fp);
$list = explode(",",$read );
var_dump($list);



?>
