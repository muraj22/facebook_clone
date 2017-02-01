<?php
if(!function_exists("video_title_in_date")){
function video_title_in_date($date){$date=tod($date);
  return date('M, d, Y g:ia', strtotime($date));	
}
}
?>