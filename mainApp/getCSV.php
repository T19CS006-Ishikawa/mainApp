<?php 
$path = 'https://app-for-lms.herokuapp.com/csvData';

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
echo "<br>";



// ダウンロード元のファイルパス（絶対パス、ファイル名まで含む）を指定する
//$root

$data = file_get_contents($root);

file_put_contents('./csvData',$data); //ファイルの保存先

//check
$filename = "/csvData/NULL.csv";

if (file_exists($filename)) {
    echo "$filename が存在します";
} else {
    echo "$filename は存在しません";
}

?>