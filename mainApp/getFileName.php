
<?php

$fh = fopen('https://file-upload-app.herokuapp.com/getFilePath.php', 'r');

while($sRec = fgets($fh))

{

 echo "> $sRec<BR>";

}

fclose($fh);

?>
