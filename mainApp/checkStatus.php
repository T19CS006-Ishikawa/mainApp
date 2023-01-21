<?php
//提出ステータスのチェックを行い、notであれば日付をチェックし、リマインドする日であればメッセージを送信する。
//まずステータスを取得するために、今あるテキストファイルのうちから*_status.txtを取得する
$csv_url = 'https://file-upload-app.herokuapp.com/upfile/';
$url = 'https://app-for-lms.herokuapp.com/';
$csvData_path = __DIR__.'/csvData/';
$push_url ='https://app-for-lms.herokuapp.com/pushMessage.php';

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
       
       //csvデータの中身(work,科目名...)が入っている
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
       
       if($int_date > 9){
           if($int_month > 9){
                 $target_date = $int_year.'/'.$int_month.'/'.$int_date;
                 $str_target_date = (string)$target_date;
           }else {
                 $target_date = $int_year.'/0'.$int_month.'/'.$int_date;
                 $str_target_date = (string)$target_date;
           }
       }else{
           if($int_month > 9){
               $target_date = $int_year.'/'.$int_month.'/0'.$int_date;
               $str_target_date = (string)$target_date;
           }else {
               $target_date = $int_year.'/0'.$int_month.'/0'.$int_date;
               $str_target_date = (string)$target_date;
           }
       }
       echo $str_target_date."<br>";
       $today = date('Y/m/d',time());
       echo $today."<br>";
       
       //リマインドの日だった時の処理を以下のif内で行う
       if(strtotime($today) == strtotime($target_date)){
           echo "succsess"."<br>";
           if(count($csv_array) == 4){   
                   $sentense = "明日提出の課題があります。"."\n"."科目：".$csv_array[2]."\n"."課題名：".$csv_array[3]."\n"."期限：".$csv_array[1];
           }else{
                   $sentense = "明日に試験のある科目があります。"."\n"."科目：".$csv_array[2]."\n"."日程：".$csv_array[1];
           }
           $content = $sentense;
           
           echo "succsess 1"."<br>";
           //送信用のテキストファイル
           $file_handle = fopen($csvData_path."push.txt",'w');
           fputs($file_handle, $content);
           fclose($file_handle);
           
           echo "succsess 2"."<br>";
           //プッシュメッセージ送信
           file_get_contents($push_url);
           
           //リマインドステータスを変更(sendに)する
           $status[2] = "send";
           //ステータスを反映させるために上書き
           if(count($status) == 4){
               $file_data = $status[0].','.$status[1].','.$status[2].','.$status[3];
           }
           else{
               $file_data = $status[0].','.$status[1].','.$status[2];
           }
           echo "succsess3"."<br>";
           
           $status_text_path = $csvData_path.$unEdited[$num];
           $file_handle = fopen($status_text_path,'w');
           fputs($file_handle,$file_data);
           fclose($file_handle);
       }


       
    }
}

//var_dump($edited);

?>