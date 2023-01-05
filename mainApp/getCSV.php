<?php 
$dlpath = 'https://file-upload-app.herokuapp.com/upfile';
$path = 'https://app-for-lms.herokuapp.com/csvData';

//echo $c;
$fp = "mainList.txt";

$read = file_get_contents($fp);
//$list = file($read);
$list = explode("|",$read );
//var_dump($list);

//list[0] = csvファイル名になる
$csvname = '/'.$list[0];

$dlroot = $dlpath.$csvname;
$root = $path.$csvname;

echo "ダウンロード元：".$dlroot;
echo "<br>";
echo "ダウンロード先：".$root;
echo "<br>";



// ダウンロード元のファイルパス（絶対パス、ファイル名まで含む）を指定する

// ダウンロードするサーバのファイルパス
$filepath = dlroot;
 
// HTTPヘッダ
header('Content-Type: application/octet-stream');
header('Content-Length: '.filesize($filepath));
header('Content-Disposition: attachment; filename=download.csv');
 
// ファイル出力
readfile($filepath);
/*
$data = file_get_contents($path);
echo $data;

file_put_contents('./csvData',$data); //ファイルの保存先
*/
//check
$filename = "csvData/課題データ2.csv";

if (file_exists($filename)) {
    echo "$filename が存在します";
} else {
    echo "$filename は存在しません";
}

?>