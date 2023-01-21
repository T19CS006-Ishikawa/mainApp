<?php
//提出ステータスのチェックを行い、notであれば日付をチェックし、リマインドする日であればメッセージを送信する。
//まずステータスを取得するために、今あるテキストファイルのうちから*_status.txtを取得する
$csv_url = 'https://file-upload-app.herokuapp.com/upfile/';
$url = 'https://app-for-lms.herokuapp.com/';

$read = glob('./csvData/*.txt');

$count = 0;
$target = "not";

for($num = 0; $num < count($read);$num++){
    $result[$num] = $read[$num];
    $test = strpos($result[$num], "_status.txt");
    if($test != 0){
        //文頭のドットを除去
        $unEdited[$count] = substr($result[$num],1);
        //念の為ファイル名のみを取得しとく
        
        $edited[$count] = substr($unEdited[$count],9);
        $length = strlen($edited[$count]); //文字列の長さ
        $edited[$count] = substr($edited[$count],0,$length-11);
        
        $count++;
    }
}


for($num = 0; $num < count($unEdited);$num++){
    $path = $url.$unEdited[$num];
    $status_array[$num] = file_get_contents($path);
    echo $status_array[$num]."<br>";
    $status = explode(',', $status_array[$num]);
    
    if(strcmp($status[2],$target) == 0){
        
       //file_get_contents($schedule_path);
       $get_path  = $csv_url.$edited[$num].".csv";
       
       $read_csv = file_get_contents($get_path);
       $csv_array = explode(',',$read_csv);
       
       $date = $csv_array[1];  //日付を取得
       $date_array = explode('/',$date);
       // 日付関数を用いる準備として年/月/日の部分をint型に変換
       $int_year = (int)$date_array[0];
       $int_month = (int)$date_array[1];
       $int_date = (int)$date_array[2];
       
       //日付のチェック、ここでは提出期限もしくは試験日の１日前かをチェックする
       if($int_date == 1){
           if($int_month == 1){
               $int_year--;
               $int_month = 12;
               $int_date = 31;
           }else{
               $int_month--;
               if($int_month == 2){
                   $int_date = 28;
               }else if($int_month == 4 || $int_month == 6 || $int_month == 9 || $int_month == 11){
                   $int_date = 30;
               }else {
                   $int_date = 31;
               }
           }
           
       }else{
           $int_date--;
       }
       
       $target_date = $int_year.'/'.$int_month.'/'.$int_date;
       $str_target_date = (string)$target_date;
       echo $str_target_date."<br>";
       $today = date('Y/m/d',time());
       echo $today."<br>";
       
       if(strtotime($today) == strtotime($target_date)){
           echo "succsess"."<br>";
       }
       
        
    }
}

//var_dump($edited);

?>