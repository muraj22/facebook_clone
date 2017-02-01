var	ajaxify_handler=function(){		
$(this).trigger("custom_ajaxify_click");	
return false;
		};

(function($){




jQuery.AjaxifyDefaults = {  
		event:'custom_ajaxify_click', /*specify the event*/
		link:'ajaxify', /* specify the link, priority is for the href attr.*/
		target:'#ajax_container', /*the data loaded via ajax will be placed here*/
		animateOut:false,
		animateIn:false,
		animateOutSpeed:'normal',
		animateInSpeed:'normal',
		method: "get", /* the request method GET or POST*/
		tagToload:false, /* inserts just the tag from the data loaded, it can be specified as t a second argument in the 'target' attr(#box,#result)*/
		loading_txt:'',
		loading_img:"images/loading.gif",
		loading_target: false,
		loading_fn:function(options){
			jQuery.ajaxifyLoading(options);
		},
		loadHash:false,	/* for use this to resolve bookmarking issues, see example for more details*/
		title:false, /* change page title along with the request. */
		forms:false, /* send form data along with th request (forms, input , radio ... etc jquery selector) */
		params:"function",/*extend parameters for the webpage. it can be set to function since v2*/
		timeout:false, /*in ms.  there is a problem in this option on linux servers*/
		contentType:"application/x-www-form-urlencoded",
		dataType:'html',
		cache:false, /* force the browser not to cache*/
		username:false, /*username HTTP access authentication*/
		password:false, /*password HTTP access authentication*/
		onStart:function(op){}, /* a callback function before start requesting.*/
		onError:function(op){
			jQuery.ajaxifyManip(op,"<font style='color: #CC0000'>Error: </font> Couldn't open the page.");		
		}, /* a callback function if error happened while requesting*/
		onSuccess:function(op){},/* a callback function if the request finished successfuly*/
		onComplete:function(op){}//*a callback function when the request finished weather it was a successful one or not.*/
	};
jQuery.AjaxifyFirstLoad = true;
jQuery.AjaxifyhistorySet = new Object();
jQuery.AjaxifyPageTitle = document.title;
jQuery.AjaxifyDebug = false;



jQuery.fn.ajaxify = function(options) {  
	if(!jQuery(this).size()){
		jQuery.ajaxifylog('Error: No matched element/s for your ajaxify selector " '+jQuery(this).selector+' ".');
		return false;
	}
	var ver = jQuery.fn.jquery.split('.');

	return this.each(function() {
	var current = jQuery.extend({},jQuery.AjaxifyDefaults, options);
	if(jQuery.metadata){
	current = jQuery.extend(current,jQuery(this).metadata());
	}
	
	if($(this).attr("data-ajaxified")!=="y"){
	$(this).attr("data-ajaxified","y");
	}
	if(current.event){

$(this).bind("custom_ajaxify_click",function(){
	if($(this).attr("ajaxify")===undefined){return false;}
	jQuery(this).ajaxifyAnalyse(current);
			if(!current.hash)
				jQuery.ajaxifyLoad(current);
			else{
				jQuery.ajaxifyHash(current);
			}
			 //stop browser
			 return false;
	});
		$(this).bind("click",ajaxify_handler);
		}
		else{
		jQuery(this).ajaxifyAnalyse(current);
		jQuery.ajaxifyLoad(current);		
	}	
		//for bookmarking	
		if(current.loadHash  && jQuery.AjaxifyFirstLoad){
			jQuery(this).ajaxifyAnalyse(current);
			if(document.location.hash.replace(/^#/, '') == current.hash	&& current.hash){
				jQuery.ajaxifyHash(current);
				jQuery.AjaxifyFirstLoad = false;
			}
		}
		
  }); // end each fn 
}; // end ajaxify fn


 

 
jQuery.fn.ajaxifyAnalyse = function(current){
	current.object = this;
	if(jQuery(this).length>0){
		
		
		
			current.link=$(this).attr("ajaxify");
			
		if(typeof current.tagToload != 'object')
			if(jQuery(this).attr('target'))
				current.target = jQuery(this).attr('target');
			else
				current.target;
		else
			current.target = current.loading_target || '#AjaxifyTemp';
	}
	   
	if(!current.loading_target)
	   current.loading_target = current.target;
	   

	if(current.forms){
		var text = jQuery(current.forms).serialize();
		current.paramres = text;
	}
	
	if($(this).data("ajaxify")===undefined){
current.method="POST";	
}
else{
current.method=$(this).data("ajaxify");	
}


	var aka=$(this).attr("ajaxify");
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
		var lookat_textareas=$(this).find("textarea");	
		}
		else if(strpos(this,".")!==false){
		var mthis=this.replace('.','');
		var lookat_inputs=$("."+mthis).find("input"); 
		var lookat_textareas=$("."+mthis).find("textarea");
		}
		else{
		var lookat_inputs=$("#"+this).find("input"); 
		var lookat_textareas=$("#"+this).find("textarea");
		}


	var v="";
var dval="";

var ismultiple=current.object.attr("data-a_ismultiple");
	
	$(lookat_inputs).each(function(){
		if($(this).attr("name")!==undefined || $(this).attr("id")!==undefined){
		if($(this).attr("name")!==undefined && ismultiple===undefined){v=$(this).attr("name");}
		else{v=$(this).attr("id");}
if($(this).attr("type")=="checkbox" && $(this).is(':checked')){}
else if($(this).attr("type")=="checkbox"){
$(this).val("");	
}

if($(this).val()==$(this).attr("placeholder")){
dval="";	
}
else{
dval=$(this).val();
}


	current.paramres+=v+"="+dval+"&";	
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
	
	var len = current.target.length-1;
	if(typeof current.tagToload !='object')
		if(current.target.charAt(len) == '+' || current.target.charAt(len)=='-'){
			current.manip = current.target.charAt(len);
			current.target = current.target.substr(0,len);
		}

   	if(current.loadHash){
		if(!jQuery.historyInit){
			jQuery.ajaxifylog('Error: loadHash is enabled but history plugin couldn\'t be found.');
		return false;
		}
		
		if(current.loadHash === true){
			jQuery.ajaxifylog('Info: It seemes you are upgrading from v1.0. Please see the new documentation about loadHash. "attr:href" will be used instead of "true".');
			current.loadHash = "attr:href";
		}
		if(current.loadHash.toLowerCase() == 'attr:href' || 
			current.loadHash.toLowerCase() == 'attr:rel' ||
			current.loadHash.toLowerCase() == 'attr:title'){
			
			current.loadHash = current.loadHash.toLowerCase();
			current.hash = jQuery(this).attr(current.loadHash.replace('attr:',''));
			if(jQuery.browser.opera){
				current.hash = current.hash.replace('?','%3F');
				current.hash = current.hash.replace('&','%26');
				current.hash = current.hash.replace('=','%3D');
			}
		}else
			current.hash = current.loadHash;
		
		if(!current.hash)
			jQuery.ajaxifylog('Warning: You have specified loadHash, but its empty or attribute couldn\'t be found.');
	}
	
	if(!jQuery(current.target).size() && typeof current.tagToload !='object')
		jQuery.ajaxifylog('Warning: Target " '+current.target+' " couldn\'t be found.');
 	

};

 


jQuery.ajaxifyLoading = function(options){
	var html = "<div id='AjaxifyLoading'><img alt='Loading...' title='Loading...' >"+options.loading_txt+"</div>";
	if(options.loading_target)
		jQuery.ajaxifyManip(options.loading_target,html);
	else
		jQuery.ajaxifyManip(options,html);
}





jQuery.ajaxifyHash = function(current){
	var ob = new Object();
	jQuery.each(current, function(key, value) {
		ob[key] = value;
	});
	jQuery.AjaxifyhistorySet[ob.hash] = ob;
	location.hash = ob.hash;
	//if(jQuery.AjaxifyFirstLoad.history){
	////alert(ob.hash);
		jQuery.historyInit(jQuery.ajaxifyHistory);
		jQuery.AjaxifyFirstLoad.history = false;
	//}
};





jQuery.ajaxifyLoad = function(current) {
	// turn off globals 
	////alert('ajaxifyLoad'+print_r(current,true));
	jQuery.ajaxSetup({global:false});	
	//start calling  jQuery.ajax function. thank you jquery for making this easy

var curr_obj=current.object;

if($(curr_obj).data("a_id")===undefined){
var count=retcount();
count=count+"apr";

var a_common_idv=$(curr_obj).data("a_common_id");
if(a_common_idv!==undefined){
var find_common="a[ajaxify][data-a_common_id="+a_common_idv+"],input[ajaxify][data-a_common_id="+a_common_idv+"]";

$(find_common).data("a_id",count);

}

$(curr_obj).data("a_id",count);	
}

var a_toeval=$(curr_obj).data("a_id");

if($(curr_obj).data("a_noabort")!="t"){
if(window[a_toeval]){window[a_toeval].abort(); if($(curr_obj).data("a_abort")!==undefined){window[$(curr_obj).data("a_abort")]("e",$(curr_obj));} }
}
else{
var a_toeval="apr"+retcount();	
}

if($(curr_obj).data("a_starts")!==undefined){
var oks=window[$(curr_obj).data("a_starts")]($(curr_obj));
if(oks===false){
return false;
}
}

var custom_func=$(curr_obj).attr("data-a_custom_f");



window[a_toeval]=jQuery.ajax({
		type: current.method,
		url: current.link,
		dataType: current.dataType,
		data: current.paramres,
		contentType:current.contentType,
		processData:true,
		timeout:current.timeout,
		cache:current.cache,
		username:current.username,
		password:current.password,
		complete: function(){
			current.onComplete(current)
		},
		beforeSend: function(){

			current.onStart(current);
			
			if(current.animateOut){
				if(current.loading_target != current.target);//diff target? fire before start anim
					current.loading_fn(current);
				jQuery(current.target).animate(current.animateOut,current.animateOutSpeed,function(){
					////alert('hr');
					if(!current.loading_target)//already fired
					current.loading_fn(current);		
				});
			}else
				current.loading_fn(current);
			},
		  error:function(msg){
			  jQuery(current.target).stop();
			  current.onError(current,msg);
			  if(current.animateIn)
		  jQuery(current.target).animate(current.animateIn,current.animateInSpeed);
		  }
		}).done(function(data){
		////alert(data);
		if(custom_func!==undefined){//alert(1);
		
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
		jQuery(current.target).stop();
		jQuery('#AjaxifyLoading').remove();
		
		
		//if(current.title)
			//document.title = current.title;
		//else if(document.title != jQuery.AjaxifyPageTitle)
			//document.title = jQuery.AjaxifyPageTitle;
		
		
		if(current.tagToload && custom_func===undefined){
		data = '<div>'+data+'</div>'; //wrap data so we can find tags within it.
			if(typeof current.tagToload == 'string'){
				//useful to load just a piece inside response
					jQuery.ajaxifyManip(current,$(data).find(current.tagToload)); 					
			}else if(typeof current.tagToload == 'object') {
					jQuery.each(current.tagToload, function(tag, target) {
					jQuery.ajaxifyManip(target,jQuery(data).find(tag)); 
						
					});
			}
		
		}else if(custom_func===undefined){
		 // 
		 jQuery.ajaxifyManip(current,data);
		  }
		  
		  });

if($(curr_obj).data("a_quick")!==undefined){
window[$(curr_obj).data("a_quick")]($(curr_obj));
}

};




jQuery.ajaxifylog = function(message) {
	if(jQuery.AjaxifyDebug)
		if(window.console) {
			 console.debug(message);
		} else {
			 //alert(message);
		}
};





jQuery.ajaxifyHistory = function(hash){
	if(hash){
		if(jQuery.browser.safari){
			var options = jQuery.AjaxifyhistorySet[location.hash.replace(/^#/,'')]; //fix bug in history.js
		}else
			var options = jQuery.AjaxifyhistorySet[hash];
		
		if(options)
			jQuery.ajaxifyLoad(options);
		else
			jQuery.ajaxifylog('History Fired. But I couldn\'t find hash. Most propabley, the hash is empty. If so, its normal.');
	}
};





jQuery.ajaxifyManip = function(current,data){

if(typeof current != 'object'){
	var target = current;
	var current = new Object;
	var len = target.length-1;
	if(target.charAt(len) == '+' || target.charAt(len)=='-'){
		current.manip = target.charAt(len);
		current.target = target.substr(0,len);
	}
	else{
		current.manip = '';
		current.target = target;
	}
}

		jQuery(current.target).prepend(data);
};


})(jQuery);