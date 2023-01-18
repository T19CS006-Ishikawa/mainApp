
<?php
$c = file_get_contents('https://file-upload-app.herokuapp.com/upfile/list.txt');
echo $c;
$fp = "mainList.txt";
$edited = "edited.txt";
$path = "./csvData/";
//mainApp内にtxtを実質コピーする
$handle =  fopen($fp,"w");
    fputs($handle,$c);
fclose($handle);

$read = file_get_contents($fp);
$list = explode(",",$read );
for($num = 0; $num < count($list)-1;$num++){
    $list[$num]= $list[$num]."not,not|";
    
    
    if(file_exists($path.$fp)){
        $file_handle = fopen($path.$edited,'a');
        fputs($file_handle, $list[$num]);
    }else{
        $file_handle = fopen($path.$edited,'w');
        fputs($file_handle, $list[$num]);
    }
}





var_dump($list);




?>
