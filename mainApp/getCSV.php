<?php 
//＿＿＿＿＿＿mainApp＿mainApp＿mainApp＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
$dlpath = 'https://file-upload-app.herokuapp.com/upfile';
//$path = 'https://app-for-lms.herokuapp.com/csvData';

//echo $c;
$fp = "mainList.txt";

$read = file_get_contents($fp);
//$list = file($read);
$list = explode("|",$read );
var_dump($list);

//list[0] = csvファイル名になる
$csvname = '/'.$list[0];

$dlroot = $dlpath.$csvname;
//$root = $path.$csvname;

echo "<br>";
echo "ダウンロード元：".$dlroot;
echo "<br>";





$data = file_get_contents($dlroot);
$data = $data.",not";
echo "<br>";
echo $data;
echo "<br>";

//カンマ区切りで配列に格納
$array = explode(',', $data);

print_r($array);

//ここをいじる
$path = __DIR__.'/csvData/';
echo $path;
echo "<br";
$content = $data."\n";
if( is_writable($path)){
    
    $file_handle = fopen($path."data.txt","w");
    fwrite($file_handle, $content);
    
    fclose($file_handle);
    
}

//LINE APIのプログラムを実行させてみる
$LINE_path = 'https://line-bot-tester01.herokuapp.com/pushMessage.php';
file_get_contents($filename);


/*＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿*/


?>

