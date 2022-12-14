
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;

//テキストファイルの名前を一行ごと配列に格納

$file_array = file($c);/*一行ずつ格納*/
echo $file_array;


?>
