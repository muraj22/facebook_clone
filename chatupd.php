<?php
mysql_query("UPDATE registered SET datetimepn=UNIX_TIMESTAMP() WHERE id='$uid'");
mysql_query("UPDATE registered SET status='1' WHERE id='$uid'");
?>