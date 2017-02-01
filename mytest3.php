<?php
define('FFMPEG_LIBRARY', 'C:/Program Files/GIMP 2/bin/gimp-2.8.exe');
$exec_string = FFMPEG_LIBRARY." gimp -b -";
exec($exec_string,$output,$returned);
echo $returned;
?>