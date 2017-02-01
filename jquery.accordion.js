$(document).on("click",".ff_accordion",function() {
if($(this).hasClass("ffwrapper2")===true){
return false;
}

$(".ff_accordion").css("background-color","#ffffff");
$(".ff_link").css("display","inline-block");

$(".ff_accordionv").slideUp(200,function(){
$(this).parents(".ff_accordion").removeClass("ffwrapper2");
$(this).parents(".ff_accordion").addClass("ffwrapper");
$(this).parents(".ff_accordion").css("background-color","");
});


$(this).removeClass("ffwrapper");
$(this).css("background-color","#edeff4");
$(this).addClass("ffwrapper2");

$(this).find(".ff_link").css("display","none");
$(this).find(".ff_accordionv").slideDown(154);
		
});