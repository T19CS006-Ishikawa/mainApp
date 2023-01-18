
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
echo $c;
$fp = "mainList.txt";
$status = "_status.txt";
$path = "./csvData/";
//mainApp内にtxtを実質コピーする
$handle =  fopen($fp,"w");
    fputs($handle,$c);
fclose($handle);

$read = file_get_contents($fp);

//ファイル名をそれぞれ配列にいれる　
$list = explode(",",$read );
for($num = 0; $num < count($list)-1;$num++){
    //ファイル名にステータスを追加
    $list_status[$num]= $list[$num]."not,not";
    
    //ステータスを追加したものを新たに保存、ここでファイル名ごとにテキストファイルを作成する
    $handle = fopen($path.$list[$num].$status,'w');
    fputs($handle, $list_status[num]);
    
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

var_dump($list);

?>
