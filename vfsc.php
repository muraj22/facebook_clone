<?php
echo'
var wfocus_auto=true;

	function hasFocus(){
	return wfocus_auto;	
	}
	
	$(function() {
		
    $(window).focus(function() {
     wfocus_auto=true;

    });

    $(window).blur(function() {
wfocus_auto=false;
 	});
});
'
?>