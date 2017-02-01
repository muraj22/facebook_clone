<div style="background:black;margin:0 auto;text-align:center;width:100%;color:white;" id="dea" onclick="pija();">
ESTO
</div>
<script type="text/javascript">
function pija(){
var elem = document.getElementById("dea");  
<?php
include("browser_detectl.php");
$b=browser();
if($b=='f'){
 echo' elem.mozRequestFullScreen(); '; 
}
else if($b=='c' OR $b=='s'){
	echo'
	elem.webkitRequestFullScreen();  
	';
 }
?> 
}

</script>