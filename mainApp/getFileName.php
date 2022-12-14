
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;

//mainApp内にtxtを実質コピーする
$handle =  fopen("mainList.txt","w");
    fputs($handle,$c);
    readfile("mainList.txt");
    print_r(file("mainList.txt"));
fclose($handle);



$path = "https://file-upload-app.herokuapp.com/upfile/";

//行ごとに名前を格納
//$file_array = file("mainList.txt");
/*
foreach ($file_array as $name) {
    print $name."<br>";
}
*/

$count = 0;
 print $file_array[1] ;
 
 /*csv抽出
$fp = fopen($path.$file_array[$count],'r');
   while($line = fgetcsv($fp)){
        var_dump($line);
        echo "<br />";
    }
 fclose($fp);
 */

    


?>
