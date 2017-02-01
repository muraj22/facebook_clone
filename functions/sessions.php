<?php
function open_session($grs) {
	if(session_is_open($grs)===FALSE){
     session_start();
     $_SESSION[$grs] = TRUE;
	}
}

function close_session($grs) {
     session_write_close(); 
     $_SESSION[$grs] = FALSE;
}

function destroy_session($grs) {
     session_destroy();
     $_SESSION[$grs] = FALSE;
}

function session_is_open($grs) {
	if(!isset($_SESSION[$grs])){
     $_SESSION[$grs] = FALSE;	
	}
     return($_SESSION[$grs]);
}
?>