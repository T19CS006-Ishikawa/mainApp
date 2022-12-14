
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;

//mainApp内にtxtを実質コピーする
$handle =  fopen("./mainList.txt","w");
    fputs($handle,$c);
    readfile("mainList.txt");
fclose($handle);

$file_array = file("mainList.txt");
echo $file_array;



?>
