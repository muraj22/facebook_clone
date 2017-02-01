<?php

$exec_string = "C:/xampp/htdocs/ffmpeg/bin/ffmpeg.exe -i C:/xampp/htdocs/chat/new_message.mp3 C:/xampp/htdocs/chat/new_message.wav";

shell_exec($exec_string);
?>