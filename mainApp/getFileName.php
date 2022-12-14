
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;

//mainApp内にtxtを実質コピーする
$handle =  fopen("./mainList.txt","w");
    fputs($handle,$c);
    //readfile("mainList.txt");
fclose($handle);


$path = "https://file-upload-app.herokuapp.com/upfile/";

//行ごとに名前を格納
$file_array = file("mainList.txt");
/*
foreach ($file_array as $name) {
    print $name."<br>";
}
*/
$csv_array =[];
$count = 0;
 
 //csv抽出
$fp = fopen($path.$file_array[$count]);
   while($line = fgetcsv($fp)){
        var_dump($line);
        echo "<br />";
    }
 fclose($fp);

    


?>
