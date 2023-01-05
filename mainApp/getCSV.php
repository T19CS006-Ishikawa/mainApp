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
/*

echo "ダウンロード元：".$dlroot;
echo "<br>";
echo "ダウンロード先：".$root;
echo "<br>";
*/


/*
$data = file_get_contents($path);
echo $data;

file_put_contents('./csvData',$data); //ファイルの保存先
*/

export("csvdata", $dlroot);

//check
$filename = "csvData/課題データ2.csv";

if (file_exists($filename)) {
    echo "$filename が存在します";
} else {
    echo "$filename は存在しません";
}
/*＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿*/
function export($file_name, $data)
{
    $fp = fopen('php://output', 'w');
    
    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename={$file_name}");
    header('Content-Transfer-Encoding: binary');
    exit;
}

?>

