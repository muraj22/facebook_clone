<?php
if(isset($_SERVER["HTTP_X-PJAX"]) && function_exists("populate_page")){
echo $params['style'];
echo $echo;
}
else{
populate_page($echo,$params);
}
while (@ob_end_flush());
?>