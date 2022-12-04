<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html;charset=UTF-8">
	</head>
	<body>
		<form	enctype = "multipart/form-data" action = "./fileUpload1.php"	method="POST">
			<input type = "file" name = "upfile"><br>
			<input type = "submit" value ="送信">
		</form>
	</body>
</html>
<?php
//送信ボタンからの遷移か確認
if(isset($_FILES['upfile'])){
    //ファイルデータがあるかの確認
    if(!empty($_FILES['upfile']['tmp_name'])){
        //アップロード位置と名前を設定
        $upName= "upfile/".$_FILES['upfile']['name'];
        
        //アップロード処理
        if(move_uploaded_file($_FILES['upfile']['tmp_name'],$upName)){
            echo "アップロードに成功しました。";
        }else{
            echo "アップロードに失敗しました。";
        }
    }else{
            echo "ファイルを選択して送信してください。";
        }
    }

?>