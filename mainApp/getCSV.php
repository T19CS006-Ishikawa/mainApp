<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html;charset=UTF-8">
	</head>
	<body>
		<form	enctype = "multipart/form-data" action = "./pushMessage.php"	method="POST">
			<input type = "submit" value ="送信">
		</form>

	</body>
</html>


<?php 
//＿＿＿＿＿＿mainApp＿mainApp＿mainApp＿＿＿＿＿＿＿＿＿＿＿＿＿＿
//ダウンロード元のURL
$dlpath = 'https://file-upload-app.herokuapp.com/upfile';
//プッシュメッセージを送るためのパス
$push_path ='https://app-for-lms.herokuapp.com/pushMessage.php';

//mainListからファイル名の一覧を取得
$fp = "mainList.txt";
$read = file_get_contents($fp);
//ファイル名を配列にそれぞれ保存
$list =  explode(',',$read);

echo "done 1 "."<br>";

//各ファイルに対してstatus.txt１つを対応させているため、ループで各テキストファイルを呼び出し、中身を配列に格納する＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿1/18
for($num = 0; $num < count($list)-1;$num++){
    $list[$num] = substr($list[$num],0,strlen($list[$num])-4);
    $status_path[$num] = 'https://app-for-lms.herokuapp.com/csvData/'.$list[$num].'_status.txt';  
    echo $status_path[$num];
    echo "<br>";
    //status_readの配列各要素にはファイル名とステータスのセットが入っている
    $status_read[$num] = file_get_contents($status_path[$num]);
}
var_dump($status_read);
echo "<br>";
echo "done 2 "."<br>";
//各要素をさらにカンマを区切り文字として新しく配列に=>これをループ内にいれて処理
//$one = explode(',',$list);


//配列の中身を表示
var_dump($list);
echo "<br>";


//listの末尾要素以外にそれぞれファイル名が格納されている
for($num = 0; $num < count($list)-1;$num++){
    $csvname = '/'.$list[$num];
    $dlroot = $dlpath.$csvname;
 
    echo "done 3 "."<br>";
    //ダウンロード元からCSVファイルの中身を取得(配列)
    $data = file_get_contents($dlroot);
    //中身のテキストからダブルクォーテーションを除去
    $data = str_replace('"', '', $data);
    //ステータスを追加
    //$data = $data.",not,not";
   // echo $data;
   // echo "<br>";
    echo "done 4 "."<br>";
    //ファイル名をもとに対応するテキストファイルを呼び出し、中身を見る＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
    $textfile = $status_path[$num];
    $check = file_get_contents($textfile);
    echo $check;
    echo "<br>";
    $get_status = explode($check, ',');
    var_dump($get_status);
    echo "done 5 "."<br>";
    if($get_status[1] == "not"){
    //カンマ区切りで配列に格納
    $array = explode(',', $data);
    print_r($array);
    echo "<br>";
    echo $array[0];
    echo "<br>";
    
    echo "done 6 "."<br>";
    //課題データ(テキスト)を保存するためのテキストファイルを作成＋追記する
    $path = __DIR__.'/csvData/';
    $data_dir = 'data.txt';
    
    echo "done 7"."<br>";
    //送信する文章を編集
    if(count($array[0]) == "work"){
        $sentense = "新しい課題です。"."\n"."科目：".$array[2]."\n"."課題名：".$array[3]."\n"."期限：".$array[1];
    }else{
        $sentense = "試験の日程が登録されました。"."\n"."科目：".$array[2]."\n"."日程：".$array[1];
    }

    $content = $sentense;

    //送信用のテキストファイル
            $file_handle = fopen($path."push.txt",'w');
            fputs($file_handle, $content);
        
        
        
        //保存用のテキストファイル、'|'を区切り文字として追記
        if(file_exists($path.$data_dir)){
            $file_handle = fopen($path."data.txt",'a');
            fputs($file_handle, $content.'|');
        }else{
            $file_handle = fopen($path."data.txt",'w');
            fputs($file_handle, $content.'|');
        }
        
    
    fclose($file_handle);
    
    //プッシュメッセージ送信
    file_get_contents($push_path);
    
    //送信ステータスを変更(sendに)する
    $get_status[1] = "send";
    
    //ステータスを反映させるために上書き
    $file_data = $get_status[0].','.$get_status[1].','.$get_status;
    $file_handle = fopen($status_path[$num],'w');
    fputs($file_handle,$file_data);
    
    }
}



/*＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿*/


?>

