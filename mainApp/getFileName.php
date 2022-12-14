<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html;charset=UTF-8">
	</head>
	<body>
		<form	enctype = "multipart/form-data" action = "./getCSV.php"	method="POST">
			<input type = "submit" value ="取得">
		</form>

	</body>
</html>

<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
//echo $c;
$fp = "mainList.txt";
//mainApp内にtxtを実質コピーする
$handle =  fopen($fp,"w");
    fputs($handle,$c);
    //readfile($fp);
fclose($handle);

$read = file_get_contents($fp);
//$list = file($read);
$list = explode("|",$read );
//var_dump($list);

foreach($list as $str){
    echo $str;
    echo '<br>';
}






?>
