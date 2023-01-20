<?php
//提出ステータスのチェックを行い、notであれば日付をチェックし、リマインドする日であればメッセージを送信する。
//まずステータスを取得するために、今あるテキストファイルのうちから*_status.txtを取得する
$csv_url = 'https://file-upload-app.herokuapp.com/upfile/';
$url = 'https://app-for-lms.herokuapp.com/';

$read = glob('./csvData/*.txt');
var_dump($read);
echo "<br>";
$count = 0;
$target = "not";

for($num = 0; $num < count($read);$num++){
    $result[$num] = $read[$num];
    $test = strpos($result[$num], "_status.txt");
    if($test != 0){
        //文頭のドットを除去
        $unEdited[$count] = substr($result[$num],1);
        //念の為ファイル名のみを取得しとく
        $edited[$count] = substr($unEdited[$count],0,11);
        $count++;
    }
}


for($num = 0; $num < count($unEdited);$num++){
    $path = $url.$unEdited[$num];
    $status_array[$num] = file_get_contents($path);
    echo $status_array[$num]."<br>";
    $status = explode(',', $status_array[$num]);
    
    if(strcmp($status[2],$target) == 0){
        echo "yeah"."<br>";
       //file_get_contents($schedule_path);
       $get_path  = $csv_url.$edited[$num].".csv";
       echo $get_path."<br>";
       $read_csv = file_get_contents($get_path);
       $csv_array = explode(',',$read_csv);
       var_dump($csv_array);
       echo "<br>";
       $date = $csv_array[1];  //日付を取得
       $date_array = explode('/',$date);
       var_dump($date_array);
       echo "<br>";
        
    }
}

//var_dump($edited);

?>