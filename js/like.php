<?php
include("headerjs.php");
?>
<?php
$rhelper_js='../';
?>
function unlike(org_elem,f,af){
var aorder=$("#ao_gn").val(); //gets to be declared nevertheless in case of a comment to update

	if(af=="likepicx26"){
var lpid=pi_gn[aorder];
var uidv=o_gn[aorder];
var whatisit="photo";

var lparams={lpid:lpid,uidv:uidv,whatisit:whatisit};

$(".likepicclickf").parent(".lbl").eq(0).css("display","none");
$(".likepicclickvf").parent(".lbl").eq(0).css("display","inline-block");

$("#cop4v").parent().eq(0).css("display","inline-block");
$("#cop5v").parent().eq(0).css("display","none");

l_gn[aorder]=0;
tl_gn[aorder]=tl_gn[aorder]-1;
}


var fr=f;


var whatisitv=$(org_elem).parents(".mtablev").eq(0).length;

if(af!="likepicx26"){
if($(org_elem).parents(".mtablev").eq(0).length>0){
var lparams=$(org_elem).parents(".mtablev").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);
}
else{
var lparams=$(org_elem).parents(".mtabled").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);
}
}

var c=retcount();
$("body").append('<div class="hidden_sb" data-a_id="unlikes" fjax="/unlike.php?uidv='+lparams.uidv+'&whatisit='+lparams.whatisit+'&lpid='+lparams.lpid+'" id="unlikes'+c+'"></div>');
$("#unlikes"+c).click().remove();


if(af=="likepicx26"){
var wo=$("#ao_gn").val();
if(wo!=aorder){
var nogo="t";
}
}

var is_comment="f";
if(nogo===undefined){
	
if(af=="likepicx26"){
var tofind=$("#photo_theater_like").find(".likebtn2").next("div");	
var tofindv=$("#photo_theater_like");
}
else if(whatisitv>0){ //includes hand
var tofind=$(org_elem).parents(".mtablev").find(".like_comment");
var tofindv=$(org_elem).parents(".mtablev").find(".like_comment_wrapper");
var is_comment="t";
}
else{
var tofind=$(org_elem).parents(".mtabled:first").find(".likeiconito").next("div");
var tofindv=$(org_elem).parents(".mtabled:first").find(".like_story_wrapper");
}


var ltotal=$(tofind).attr("data-l_total");

ltotal=parseInt(ltotal);
ltotal=ltotal-1;

$(tofind).attr("data-l_total",ltotal);

if(whatisitv==0){
$(tofind).find(".me").remove();

var response=$(tofind).html();

var lthis=$(tofind).find(".lthis").html();

if(ltotal==1){
lthis=lthis.replace("like","likes");
$(tofind).find(".lthis").html(lthis);
}
else if(ltotal==0){
$(tofind).html(response);
$(tofindv).addClass("hidden_sb");
}
}
else if(whatisitv>0){ //includes hand
$(tofind).find(".lthisv").html(ltotal);
if(ltotal==0){
$(tofindv).addClass("hidden_sb");
}
}


}

if(af=="likepicx26"){ //update for function get next
var nresponse=$("#photo_theater_like").find(".likebtn2").next("div").html();
lw_gn[aorder]=nresponse;
}

$(org_elem).css("display","none");
$(org_elem).next(".lbl").css("display","inline-block");

if(is_comment=="t"){
ac_gn[aorder]=$("#picscommentscontainerx26").html();
}

}







function like(org_elem,f,af){
var aorder=$("#ao_gn").val();

if(af=="likepicx26"){
$(".likepicclickvf").parent(".lbl").eq(0).css("display","none");
$(".likepicclickf").parent(".lbl").eq(0).css("display","inline-block");

$("#cop5v").parent().eq(0).css("display","inline-block");
$("#cop4v").parent().eq(0).css("display","none");

var aorder=$("#ao_gn").val();
var lpid=pi_gn[aorder];
var uidv=o_gn[aorder];
var whatisit="photo";
var lparams={lpid:lpid,uidv:uidv,whatisit:whatisit};

l_gn[aorder]=1;
tl_gn[aorder]=tl_gn[aorder]+1;
}


var fr=f;


if(af!="likepicx26"){
if($(org_elem).parents(".mtablev").eq(0).length>0){
var lparams=$(org_elem).parents(".mtablev").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);
}
else{
var lparams=$(org_elem).parents(".mtabled").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);

}
}


var c=retcount();
//alert(lparams.uidv);
//alert(lparams.whatisit);
//alert(lparams.lpid);
$("body").append('<div class="hidden_sb" data-a_id="likes" fjax="/like.php?uidv='+lparams.uidv+'&whatisit='+lparams.whatisit+'&lpid='+lparams.lpid+'" id="likes'+c+'"></div>');
$("#likes"+c).click().remove();


if(af=="likepicx26"){
var wo=$("#ao_gn").val();
if(wo!=aorder){
var nogo="t";
}
}

var is_comment="f";
if(nogo===undefined){

var whatisitv=$(org_elem).parents(".mtablev").eq(0).length;

if(af=="likepicx26"){
var tofind=$("#photo_theater_like").find(".likebtn2").next("div");	
var tofindv=$("#photo_theater_like");
}
else if($(org_elem).parents(".mtablev").eq(0).length>0){
var tofind=$(org_elem).parents(".mtablev").find(".like_comment");
var tofindv=$(org_elem).parents(".mtablev").find(".like_comment_wrapper");
var is_comment="t";
}
else{
var tofind=$(org_elem).parents(".mtabled:first").find(".likeiconito").next("div");
var tofindv=$(org_elem).parents(".mtabled:first").find(".like_story_wrapper").eq(0);
}

var ltotal=$(tofind).attr("data-l_total");
//alert(ltotal);
var response=$(tofind).html();

ltotal=parseInt(ltotal);
ltotal=ltotal+1;

$(tofind).attr("data-l_total",ltotal);


if(whatisitv==0){

if(ltotal==1){
response='<span class="me">You like this.</span>';	
}
else if (strpos(response,"and")!==false){
response='<span class="me">You, </span>';	
}
else{response='<span class="me">You and </span>';}

var lthis=$(tofind).find(".lthis").html();

if(ltotal==2){
lthis=lthis.replace("likes","like");
$(tofind).find(".lthis").html(lthis);
}


if(ltotal==1){
$(tofind).html(response);
}
else{
$(tofind).prepend(response);
}

}
else if(whatisitv>0){ //includes hand
$(tofind).find(".lthisv").html(ltotal);
}


$(tofindv).removeClass("hidden_sb");

}

if(af=="likepicx26"){ //update for function get next
var nresponse=$("#photo_theater_like").find(".likebtn2").next("div").html();
lw_gn[aorder]=nresponse;
}

$(org_elem).css("display","none");
$(org_elem).prev(".lbl").css("display","inline-block");

//poner en fjax un data que sirva para hacer null sobre la variable en done :)

if(is_comment=="t"){
ac_gn[aorder]=$("#picscommentscontainerx26").html();
}

}
<?php include("endf.php"); ?>