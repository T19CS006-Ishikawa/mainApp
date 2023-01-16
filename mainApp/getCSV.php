<?php 
//＿＿＿＿＿＿mainApp＿mainApp＿mainApp＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
$dlpath = 'https://file-upload-app.herokuapp.com/upfile';
$path = 'https://app-for-lms.herokuapp.com/csvData';

//echo $c;
$fp = "mainList.txt";

$read = file_get_contents($fp);
//$list = file($read);
$list = explode("|",$read );
var_dump($list);

//list[0] = csvファイル名になる
$csvname = '/'.$list[0];

$dlroot = $dlpath.$csvname;
$root = $path.$csvname;

echo "<br>";
echo "ダウンロード元：".$dlroot;
echo "<br>";
echo "ダウンロード先：".$root;
echo "<br>";




$data = file_get_contents($dlroot);
echo "<br>";
echo $data;
echo "<br>";


//ここをいじる
$path = './csvData/';
$content = $data."\n";

if( is_writable($path)){
    
    $file_handle = fopen($path."data.txt","w");
    fwrite($file_handle, $content);
    fwrite($file_handle, "やあ＾＾");
    
    fclose($file_handle);
    
}


//check
/*
$filename = "csvData/課題データ2.csv";

if (file_exists($filename)) {
    echo "$filename が存在します";
} else {
    echo "$filename は存在しません";
}
*/
/*＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿*/


?>

