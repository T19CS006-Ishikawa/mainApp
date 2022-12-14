
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;

//mainApp内にtxtを実質コピーする
$handle =  fopen("mainList.txt","w");
    fputs($handle,$c);
    readfile("mainList.txt");
    //print_r(file("mainList.txt"))
    $list = explode("\n","mainList.txt" );
    foreach($list as $str){
        echo $str;
    }
fclose($handle);



$path = "https://file-upload-app.herokuapp.com/upfile/";


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
