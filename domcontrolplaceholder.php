<?php
echo'
$(\'[placeholder]\').focus(function() {
  var input = $(this);
  if (input.val() == input.attr(\'placeholder\')) {
    input.val(\'\');
	if(input.hasClass("dcphlgc")===true){
input.removeClass("dcphlg");
	}
	else if(input.hasClass("dcphmgc")===true){
input.removeClass("dcphmg");
	}
	else if(input.hasClass("dcphc")===true){
input.removeClass("dcph");
	}
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == \'\' || input.val() == input.attr(\'placeholder\')) {
	if(input.hasClass("dcphlgc")===true){
input.removeClass("dcphlg");
	}
	else if(input.hasClass("dcphmgc")===true){
input.removeClass("dcphmg");
	}
	else if(input.hasClass("dcphc")===true){
input.addClass("dcph");
	}
    input.val(input.attr(\'placeholder\'));
  }
}).blur();';
?>