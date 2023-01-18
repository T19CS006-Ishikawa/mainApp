
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;
$fp = "mainList.txt";
$status = "_status.txt";
$path = "./csvData/";
//mainList内にtxtを実質コピーする
$handle =  fopen($fp,"w");
    fputs($handle,$c);
fclose($handle);

//mainListの内容(ファイル名すべて)を取得
$read = file_get_contents($fp);

//ファイル名をカンマ区切りでそれぞれ配列listにいれる　
$list = explode(",",$read );


for($num = 0; $num < count($list)-1;$num++){
    $name_array = explode('.', $list[$num]);
    $name[$num] = $name_array[0];
}


for($num = 0; $num < count($list)-1;$num++){
    //ファイル名にステータスを追加
    $list_status[$num]= $name[$num].",not,not";
    echo $list_status[$num];
    echo "<br>";
    
    //ステータスを追加したものを新たに保存、ここでファイル名ごとにテキストファイルを作成する
    $status_path = $path.$name[$num].$status;
    $handle = fopen($status_path,'w');
    fputs($handle, $list_status[$num]);
    
    //ステータスを追加したものを新たにテキストファイルstatus.txtに保存
    /*
    if(file_exists($path.$fp)){
        $file_handle = fopen($path.$status,'a');//'a'は追記オプション
        fputs($file_handle, $list[$num]);
    }else{
        $file_handle = fopen($path.$status,'w');//'w'は新規作成もしくは上書きオプション(ここでは新規作成のみ)
        fputs($file_handle, $list[$num]);
    }
    fclose($file_handle);
    */
    
    fclose($handle);
}

?>
