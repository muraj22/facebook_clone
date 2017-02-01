<?php
ignore_user_abort(false);
ob_end_clean();

while(!connection_status()){
echo"<br>";
sleep(10);
flush(); 
}
if (connection_status()){
exit(); 
}
?>
