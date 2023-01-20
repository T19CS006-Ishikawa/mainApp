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
        $unEdited[$count] = $result[$num];
        $edited[$count] = substr($unEdited[$count], 10);
        $count++;
    }
}

var_dump($edited);

?>