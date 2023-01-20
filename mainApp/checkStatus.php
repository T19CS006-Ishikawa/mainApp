<?php
//提出ステータスのチェックを行い、notであれば日付をチェックし、リマインドする日であればメッセージを送信する。
//まずステータスを取得するために、今あるテキストファイルのうちから*_status.txtを取得する
$read = glob('./csvData/*.txt');
var_dump($read);
echo "<br>";
$count = 0;

for($num = 0; $num < count($read);$num++){
    $result[$num] = $read[$num];
    $test = strpos($result[$num], "_status.txt");
    if($test != 0){
        //文頭のドットを除去
        $unEdited[$count] = substr($result[$num],1);
        //念の為ファイル名のみを取得しとく
        $edited[$count] = substr($unEdited[$count], 9);
        $count++;
    }
}

$url = 'https://app-for-lms.herokuapp.com/';

for($num = 0; $num < count($unEdited);$num++){
    $path = $url.$unEdited[$num];
    $status_array[$num] = file_get_contents($path);
    echo $status_array[$num]."<br>";
}

var_dump($edited);

?>