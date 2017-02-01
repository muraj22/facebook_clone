<?php
$sechov='';
$sechov.='
$(function() {
   $.support.placeholder = false;
   test = document.createElement("input");
   if("placeholder" in test) $.support.placeholder = true;

   if(!$.support.placeholder) { //alert(2);
	$(document).on("focus", "input:text[placeholder!=\'\'],textarea[placeholder!=\'\']", function(){
         if ($(this).val() == $(this).attr("placeholder")) {
            $(this).val("");
			if($(this).hasClass("dcphc")===true){$(this).removeClass("dcph");}
			else if($(this).hasClass("dcphmgc")===true){$(this).removeClass("dcphmg");}
			else if($(this).hasClass("dcphlgc")===true){$(this).removeClass("dcphlg");}
			else if($(this).hasClass("dcphogc")===true){$(this).removeClass("dcphog");}
         }
      }).on("blur", "input:text[placeholder!=\'\'],textarea[placeholder!=\'\']", function () {
         if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
            $(this).val($(this).attr("placeholder"));
			if($(this).hasClass("dcphc")===true){$(this).addClass("dcph");}
			else if($(this).hasClass("dcphmgc")===true){$(this).addClass("dcphmg");}
			else if($(this).hasClass("dcphlgc")===true){$(this).addClass("dcphlg");}
			else if($(this).hasClass("dcphogc")===true){$(this).addClass("dcphog");}
         }
      });
      }
	  else{
	$(document).on("focus", "input:text[placeholder!=\'\'],textarea[placeholder!=\'\']", function(){
			if($(this).val()=="" && $(this).attr("data-ph_focus")!==undefined){
			$(this).addClass($(this).attr("data-ph_focus"));
			}
	});

	$(document).on("blur", "input:text[placeholder!=\'\'],textarea[placeholder!=\'\']", function(){
         if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
            $(this).val(""); 
         }
		 	if($(this).attr("data-ph_focus")!==undefined){
			$(this).removeClass($(this).attr("data-ph_focus"));
			}
      }); 
	  }

$(document).ready(function(){
var active = document.activeElement;
$("input:text[placeholder!=\'\']").trigger("blur","dcph");
$("textarea[placeholder!=\'\']").trigger("blur","dcph");	 
$(active).focus();
});

});';
?>