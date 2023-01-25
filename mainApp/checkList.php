<?php
$read = glob('./csvData/*.txt');
echo "ファイル一覧<br>";

for($num = 0; $num < count($read);$num++){
    $result[$num] = $read[$num];
    $test = strpos($result[$num], "_status.txt");
    if($test != 0){
        //文頭のドットを除去
        $unEdited[$count] = substr($result[$num],1);
        //念の為ファイル名のみを取得しとく
        
        $edited[$count] = substr($unEdited[$count],9);
        $length = strlen($edited[$count]); //文字列の長さ
        $edited[$count] = substr($edited[$count],0,$length-11);
        echo $unEdited[$count]."<br>";
        
        $count++;
    }
}

?>