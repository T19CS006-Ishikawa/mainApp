<?php 
$path = 'https://file-upload-app.herokuapp.com/upfile';
$c = file_get_contents($path);
//echo $c;
$fp = "mainList.txt";

$read = file_get_contents($fp);
//$list = file($read);
$list = explode("|",$read );
//var_dump($list);

//list[0] = ファイル名になる
$csvname = '/'.$list[0];
$root = $path.$csvname;

echo $root;



// ダウンロード元のファイルパス（絶対パス、ファイル名まで含む）を指定する
$url = $root;

$data = file_get_contents($url);

file_put_contents('./csvData',$data); //ファイルの保存先

var_dump('./csvData'.$csvname);
//$check = file_get_contents('./csvData'.$csvname);

?>