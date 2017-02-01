<?php
ignore_user_abort(true);

$exec_string = "C:/xampp/htdocs/upfrev/ffmpeg/bin/ffmpeg.exe -i $src $dest";
exec($exec_string);
?>