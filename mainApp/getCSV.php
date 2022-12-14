<?php 
$cf = file_get_contents("./getFileName.php");
$file = '';

//CSVファイルを読み込みモードでオープン
if (($fp = fopen($file, 'r')) !== FALSE){
    $row = 0;
    
    //CSVファイルを1行ずつ読み込む
    while (($line = fgetcsv($fp)) !== FALSE) {
        
        //タイトル行の取得
        if ($row ==  0){
            echo 'タイトル:'.$line[0].'<br>';
            $row++;
            continue;
        }
        echo $line[0].'<br>';
        echo $line[1].'<br>';
        echo $line[2].'<br>';
        echo $line[3].'<br>';
        echo $line[4].'<br>';
        
        $row++;
    }
}else{
    echo $file.'の読み込みに失敗しました。';
}

//ファイルをクローズ
fclose($fp);



?>