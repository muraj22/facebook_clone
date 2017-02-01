<?php
include("start.php");
if($dtable="commentv"){
    $table="commentsv";
}else{
    $table="comments";   
}
mysql_query("UPDATE $table SET comment='$new_comment' WHERE id='$uid' AND sbid='$sbid'");
?>