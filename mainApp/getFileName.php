
<?php

$fh = fopen('https://file-upload-app.herokuapp.com/getFileName.php', 'r');

$count = 0;

while($count <= count($fh) ){
    echo $fh[$count];
    echo '<br>';
    $count++;
}
fclose($fh);

?>
