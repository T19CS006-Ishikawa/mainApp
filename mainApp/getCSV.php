<?php 
$path = 'https://file-upload-app.herokuapp.com/upfile';
$c = file_get_contents($path);
//echo $c;
$fp = "mainList.txt";

$read = file_get_contents($fp);
//$list = file($read);
$list = explode("|",$read );
//var_dump($list);

echo $list;


/*
// ダウンロード元のファイルパス（絶対パス、ファイル名まで含む）を指定する
$url = 'http://example.com/voice/voice.mp3';

$data = file_get_contents($url);

file_put_contents('./download/hozon.mp3',$data); //ファイルの保存先
*/


?>