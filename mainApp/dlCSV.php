<?php 
// ファイルのパス

$filepath = 'http://hoge.jp/datacsv'; 

// リネーム後のファイル名 $filename = 'data_down.csv';
// ファイルタイプを指定 
header('Content-Type: application/force-download');
// ファイルサイズを取得し、ダウンロードの進捗を表示 

header('Content-Length: '.filesize($filepath));
// ファイルのダウンロード、リネームを指示
header('Content-Disposition: attachment; filename="'.$filename.'"');
// ファイルを読み込みダウンロードを実行
readfile($filepath);
?>