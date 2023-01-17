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
//＿＿＿＿＿＿mainApp＿mainApp＿mainApp＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
//ダウンロード元のURL
$dlpath = 'https://file-upload-app.herokuapp.com/upfile';

$fp = "mainList.txt";

$read = file_get_contents($fp);

//カンマを区切り文字としてファイル名をそれぞれ配列に格納する
$list = explode(",",$read );
//配列の中身を表示
var_dump($list);
echo "<br>";
//listの末尾要素以外にそれぞれファイル名が格納されている

for($num = 0; $num < count($list)-1;$num++){
    $csvname = '/'.$list[$num];
    $dlroot = $dlpath.$csvname;

    //ダウンロード元からCSVファイルの中身を取得
    $data = file_get_contents($dlroot);
    //中身のテキストからダブルクォーテーションを除去
    $data = str_replace('"', '', $data);
    //ステータスを追加
    $data = $data.",no,no";
    echo $data;
    echo "<br>";

    //カンマ区切りで配列に格納
    $array = explode(',', $data);
    print_r($array);

    //課題データ(テキスト)を保存するためのテキストファイルを作成＋追記する
    $path = __DIR__.'/csvData/';
    $dir = 'data.txt';
    //ここの改行コードは検討
    $content = $data."\n";
    if( is_writable($path)){
        if(file_exists($dir)){
            $file_handle = fopen($path."data.txt","a");
            fputs($file_handle, $content);
        }else{
            $file_handle = fopen($path."data.txt","w");
            fputs($file_handle, $content);
        }
        fclose($file_handle);
    
    }
}

$push = __DIR__.'/pushMessage.php';
file_get_contents($push);

/*＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿*/


?>

