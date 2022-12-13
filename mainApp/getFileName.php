
<?php
$path = 'https://file-upload-app.herokuapp.com/getFileName.php';
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
echo $c;


?>
