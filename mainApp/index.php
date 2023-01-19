<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html;charset=UTF-8">
	</head>
	<body>
		<form	enctype = "multipart/form-data" action = "./getFileName.php"	method="POST">
			<input type = "submit" value ="取得">
		</form>
		<form	enctype = "multipart/form-data" action = "./getCSV.php"	method="POST">
			<input type = "submit" value ="CSV">
		</form>
				<form	enctype = "multipart/form-data" action = "./checkList.php"	method="POST">
			<input type = "submit" value ="リストチェック">
		</form>
				
		<form	enctype = "multipart/form-data" action = "./checkStatus.php"	method="POST">
			<input type = "submit" value ="ステータスチェック">
		</form>

	</body>
</html>

