<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html;charset=UTF-8">
	</head>
	<body>
		<form	enctype = "multipart/form-data" action = "./getCSV.php"	method="POST">
			<input type = "submit" value ="再送信">
		</form>

	</body>
</html>


<?php 
//＿＿＿＿＿＿mainApp＿mainApp＿mainApp＿＿＿＿＿＿＿＿＿＿＿＿＿＿
//ダウンロード元のURL
$dlpath = 'https://file-upload-app.herokuapp.com/upfile';
//プッシュメッセージを送るためのパス
$push_path ='https://app-for-lms.herokuapp.com/pushMessage.php';
//$push_path ='https://line-bot-tester01.herokuapp.com/multiCast.php';

//mainListからファイル名の一覧を取得
$fp = "mainList.txt";
$read = file_get_contents($fp);
//ファイル名を配列にそれぞれ保存
$list =  explode(',',$read);

//各ファイルに対してstatus.txt１つを対応させているため、ループで各テキストファイルを呼び出し、中身を配列に格納する＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿1/18
for($num = 0; $num < count($list)-1;$num++){
    $filename[$num] = substr($list[$num],0,strlen($list[$num])-4);
    $status_path[$num] = 'https://app-for-lms.herokuapp.com/csvData/'.$filename[$num].'_status.txt';  

    //status_readの配列各要素にはファイル名とステータスのセットが入っている ok
    $status_read[$num] = file_get_contents($status_path[$num]);
}


//listの末尾要素以外にそれぞれファイル名が格納されている
for($num = 0; $num < count($list)-1;$num++){
    $csvname = '/'.$list[$num];
    $dlroot = $dlpath.$csvname;
 
    //ダウンロード元からCSVファイルの中身を取得(配列)
    $data = file_get_contents($dlroot);
    
    //中身のテキストからダブルクォーテーションを除去
    $data = str_replace('"', '', $data);

    //ファイル名をもとに対応するテキストファイルを呼び出し、中身を見る
    $textfile = $status_path[$num];
    $check = file_get_contents($textfile);
 
    $get_status = explode(',',$check);

    
    if($get_status[1] == "not"){
    //カンマ区切りで配列に格納
    $array = explode(',', $data);

    //課題データ(テキスト)を保存するためのテキストファイルを作成＋追記する
    $path = __DIR__.'/csvData/';
    $data_dir = 'data.txt';
    
    //送信する文章を編集
    if(count($array) == 4){
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
    echo "「".$list[$num]."」の情報をLINE送信しました。送信ステータスを変更します。"."<br>";
    
    //送信ステータスを変更(sendに)する
    $get_status[1] = "send";
    
    
    //ステータスを反映させるために上書き
    if(count($array) == 4){
    $file_data = $get_status[0].','.$get_status[1].','.$get_status[2].','.$get_status[3];
    }
    else{
        $file_data = $get_status[0].','.$get_status[1].','.$get_status[2];
    }
 
    $_path = substr($status_path[$num],33);
    $edit_path = __DIR__.$_path;
    $file_handle = fopen($edit_path,'w');
    fputs($file_handle,$file_data);
    fclose($file_handle);

    }
}



/*＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿*/


?>

