
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;
$fp = "mainList.txt";
//mainApp内にtxtを実質コピーする
$handle =  fopen($fp,"w");
    fputs($handle,$c);
    readfile("mainList.txt");
fclose($handle);

$read = fopen($fp,"r");
$list = file($read);
$list = explode("\n",$list );
foreach($list as $str){
    echo $str;
}
fclose($read);
    



$path = "https://file-upload-app.herokuapp.com/upfile/";


$count = 0;
 //print $file_array[1] ;
 
 /*csv抽出
$fp = fopen($path.$file_array[$count],'r');
   while($line = fgetcsv($fp)){
        var_dump($line);
        echo "<br />";
    }
 fclose($fp);
 */

    


?>
