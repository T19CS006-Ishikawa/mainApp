<?php
//csvファイルの中身から日付を取得して、それを元にリマインドの日付を導出し今の日付と比較する

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
        $edited[$count] = substr($unEdited[$count], 9);
        $count++;
    }
}

$url = 'https://app-for-lms.herokuapp.com/';
$schedule_path = $url.'checkSchedule.php';
for($num = 0; $num < count($unEdited);$num++){
    $path = $url.$unEdited[$num];
    $status_array[$num] = file_get_contents($path);
    echo $status_array[$num]."<br>";
    $status = explode(',', $status_array[$num]);
    
    if(strcmp($status[2],$target) == 0){
        echo "yeah"."<br>";
        //file_get_contents($schedule_path);
        //if
    }
}


?>