<?php
//提出ステータスのチェックを行い、notであれば日付をチェックし、リマインドする日であればメッセージを送信する。
//まずステータスを取得するために、今あるテキストファイルのうちから*_status.txtを取得する
$read = glob('./csvdata/*.txt');
//var_dump($read);
$count = 0;

for($num = 0; $num < count($read);$num++){
    $result[$num] = read[$num];
    $test = strpos($result[$num], "_status.txt");
    if($test !== false){
        $unEdited[$count] = $result[$num];
        $edited[$count] = substr($unEdited[$count], 10);
        $count++;
    }
}

var_dump($edited);

?>