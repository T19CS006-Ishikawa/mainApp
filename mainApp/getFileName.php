<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html;charset=UTF-8">
	</head>
	<body>
		<form	enctype = "multipart/form-data" action = "./getCSV.php"	method="POST">
			<input type = "submit" value ="送信">
		</form>

	</body>
</html>

<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
$get_path = 'https://file-upload-app.herokuapp.com/upfile/';
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
var_dump($name);

//現時点でのテキストファイルの一覧を取得
$textfile_array = glob('./csvData/*.txt');
$work = "work";
for($num = 0; $num < count($list)-1;$num++){
    //for($int = 0; $int < $count; $int++)
    echo "loop".$num."<br>";
    $_path = $get_path.$name[$num].".csv";
    echo $_path."<br>";
        
    $get = file_get_contents($_path);
    echo $get."<br>";
    $get_array = explode(',', $get);
    var_dump($get_array);
    echo "<br>";
        
    //ファイル名にステータスを追加
    if(count($get_array) == 4){
        $list_status[$num]= $name[$num].",not,not,not";//名前,送信ステータス,リマインドステータス,提出ステータス
    }else{
        $list_status[$num] = $name[$num].",not,not";//名前,送信ステータス、リマインドステータス
    }
    
    
    echo $list_status[$num];
    echo "<br>";
    
    //ステータスを追加したものを新たに保存、ここでファイル名ごとにテキストファイルを作成する
    $status_path = $path.$name[$num].$status;
    echo $status_path."<br>";
   
    if(in_array($status_path, $textfile_array)){
        continue;
    }
        
       $handle = fopen($status_path,'w');
        fputs($handle, $list_status[$num]);     
    
        fclose($handle);
         
    echo "loop".$num."end"."<br>";
}

?>
