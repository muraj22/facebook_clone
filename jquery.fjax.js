jQuery.fjaxDefaults = {  
		event:'custom_fjax_click',
		link:'fjax'
	};


jQuery.fn.fjax = function(options) {  
$(this).attr("ajaxified","y");

	var current = jQuery.extend({},jQuery.fjaxDefaults, options);

	if($(this).attr("fjax")===undefined){return false;}
	jQuery(this).fjaxAnalyse(current);
	jQuery.fjaxLoad(current);
};


jQuery.fn.fjaxAnalyse = function (current) {
current.object = this;
if($(this).length==0){return false;}
	
current.link=$(this).attr("fjax");


if($(this).data("fjax")===undefined){
current.method="POST";	
}
else{
current.method=$(this).data("fjax");	
}

if($(this).attr("data-a_pfunc") !== undefined) {
    window[$(this).attr("data-a_pfunc")]();
}
	var aka=$(this).attr("fjax");
	aka=aka.split("?");
	current.link=aka[0];
	current.paramres="";
	aka=aka[1];

	if(aka!==undefined){
	current.paramres=aka+"&";
	}
	
	if(!current.paramres){
	current.paramres="";	
	} 
	if($(this).data("a_form")!==undefined || $(this).data("a_formo")!==undefined){
	if($(this).data("a_form")!==undefined){		
	if(strpos($(this).data("a_form"),",")!==false){
	var golook=$(this).data("a_form").split(",");
	}
	else{var golook=new Array(); golook[0]=$(this).data("a_form");}
}
else if($(this).data("a_formo")!==undefined){
var golook=eval($(this).data("a_formo"));	
}
if(golook!==undefined){
var thisv=$(this);

	$(golook).each(function(){
		if($(thisv).data("a_formo")!==undefined){
		var lookat_inputs=$(this).find("input");
		var lookat_selects=$(this).find("select");
		var lookat_textareas=$(this).find("textarea");	
		}
		else if(strpos(this,".")!==false){
		var mthis=this.replace('.','');
		var lookat_inputs=$("."+mthis).find("input"); 
		var lookat_selects=$("."+mthis).find("select"); 
		if(mthis=="_20y"){//strange patch because it finds two textareas somehow
		var lookat_textareas=$("."+mthis).find("textarea").eq(0);
		}
		else{
		var lookat_textareas=$("."+mthis).find("textarea");
		}
		}
		else{
		var lookat_inputs=$("#"+this).find("input"); 
		var lookat_selects=$("#"+this).find("select"); 
		var lookat_textareas=$("#"+this).find("textarea");
		}


	var v="";
var dval="";

var ismultiple=current.object.attr("data-a_ismultiple");
var ismultiplev = current.object.attr("data-a_ismultiplev");

		$(lookat_selects).each(function(){
		v="";
		if($(this).attr("name")!==undefined || $(this).attr("id")!==undefined){
		if($(this).attr("name")!==undefined && ismultiple===undefined){v=$(this).attr("name");}
		else{v=$(this).attr("id");}
		if(v===undefined){v="";}

if($(this).val()==$(this).attr("placeholder")){
dval="";	
}
else{
dval=$(this).val();
}

if (strpos(dval, "&") !== false) {
    dval = str_replace("&", ".ampersand.reserved.", dval);
}

	current.paramres+=v+"="+dval+"&";	
		}
		});
		var fundsv_count=0;
var sdval="";
	$(lookat_inputs).each(function(){
		v="";
		if($(this).attr("name")!==undefined || $(this).attr("id")!==undefined){
		    if ($(this).attr("name") !== undefined && ismultiple === undefined && $(this).attr("type") != "radio") {

		        if (ismultiplev !== undefined) {
		            if ($(this).attr("name") == "tags" || $(this).attr("name") == "tagsv") {
		                v = $(this).attr("id");
		            } else {
		                v = $(this).attr("name");
		            }
		        } else {
		            v = $(this).attr("name");
		        }
		    }
		else{v=$(this).attr("id");}
		if(v===undefined){v="";}

sdval=$(this).val();

if($(this).attr("type")=="checkbox" && $(this).is(':checked')){sdval=$(this).val();}
else if($(this).attr("type")=="checkbox"){
sdval="";
}


if($(this).attr("type")=="radio" && $(this).is(':checked')){sdval=$(this).val();}
else if($(this).attr("type")=="radio"){
sdval="";
}


if($(this).val()==$(this).attr("placeholder")){
dval="";	
}
else{
dval=sdval;
}

if($(this).attr("id")=="fundsv" && fundsv_count>0){ //fundsv duplicate hack
	
}
else{
	if($(this).attr("id")=="fundsv"){
	fundsv_count++;	
	}
	if (strpos(dval, "&") !== false) {
	    dval = str_replace("&", ".ampersand.reserved.", dval);
	}

	current.paramres+=v+"="+dval+"&";	
}

	}
	});
	
	
	
	$(lookat_textareas).each(function(){
		if($(this).attr("name")!==undefined || $(this).attr("id")!==undefined){
		if($(this).attr("name")!==undefined){v=$(this).attr("name");}
		else{v=$(this).attr("id");}
		
if($(this).val()==$(this).attr("placeholder")){
dval="";	
}
else{
dval=$(this).val();
}
if (strpos(dval, "&") !== false) {
    dval = str_replace("&", ".ampersand.reserved.", dval);
}

		current.paramres+=v+"="+dval+"&";	
			}
	});
	
	});
	


	}
	

	
	}


	if(typeof params == 'string'){
		if(text)
		current.paramres +='&'+params;
		else
		current.paramres = params;
	}

	
		}



jQuery.fjaxLoad=function(current) {

jQuery.ajaxSetup({global:false});	

var curr_obj=current.object;

if ($(curr_obj).data("a_id") === undefined) {
var count=retcount();
count=count+"apr";

var a_common_idv=$(curr_obj).data("a_common_id");
if(a_common_idv!==undefined){
var find_common="a[fjax][data-a_common_id="+a_common_idv+"],input[fjax][data-a_common_id="+a_common_idv+"]";

$(find_common).data("a_id",count);

}

$(curr_obj).data("a_id",count);	
}

var a_toeval=$(curr_obj).data("a_id");

if($(curr_obj).data("a_noabort")!="t"){
if(window[a_toeval]){
window[a_toeval].abort(); if($(curr_obj).data("a_abort")!==undefined){window[$(curr_obj).data("a_abort")]("e",$(curr_obj));} 
$("[data-a_id="+a_toeval+"]").not($(curr_obj)).removeClass("async_saving");
}

}
else{
var a_toeval="apr"+retcount();	
}

if($(curr_obj).data("a_starts")!==undefined && $(curr_obj).data("a_starts")!=""){
var oks=window[$(curr_obj).data("a_starts")]($(curr_obj));
if(oks===false){
return false;
}
}
 
var custom_func=$(curr_obj).attr("data-a_custom_f");
window[a_toeval]=$.ajax({
		type: current.method,
		url: current.link,
		processData:true,
		data: current.paramres,
		cache: false /* force the browser not to cache*/
}).done(function (data) {
  		//alert(data);
		if(custom_func!==undefined){
		
		if(strpos(custom_func,",")!==false){
		var custom_funcv=custom_func.split(",");	
		}
		else{
		var custom_funcv=new Array(); custom_funcv[0]=custom_func;}
		
		$(custom_funcv).each(function(k,v){
		if(v!=""){
		window[v](data,$(curr_obj));	
		}
		});
		
		}
		else{
if($(curr_obj).attr("data-a_load")!==undefined){
var thisv=$(curr_obj);
var tofind=eval($(curr_obj).data("a_load"));
$(curr_obj).removeClass("async_saving");
$(tofind).html(data);
$(tofind).removeClass("hidden_sb");
}	
else{$("#ajax_container").prepend("<div>"+data+"</div>");}
		}
		  
		  });

if($(curr_obj).data("a_quick")!==undefined){
window[$(curr_obj).data("a_quick")]($(curr_obj));
}


}