(function($){
	$.fn.tipTip = function(options) {
		var defaultPositionv=$(this).data("t_position");
		if(defaultPositionv==undefined){
		defaultPositionv="top";	
		}
		
	
		
		if($(this).data("t_text")==""){
			if($(this).next(".tooltip_text").length==0){
			$(this).after('<div class="tooltip_text">Loading</div>');
			}
		var contentv=$(this).next(".tooltip_text").html();	
		}else{var contentv=false;}

	
		var defaults = { 
			activation: "hover",
			keepAlive: false,
			maxWidth: "200px",
			edgeOffset: 3,
			defaultPosition: defaultPositionv,
			delay: 400,
			fadeIn: 200,
			fadeOut: 200,
			attribute: "title",
			content: contentv, // HTML or String to fill TipTIp with
		  	enter: function(){},
		  	exit: function(){}
	  	};
	 	var opts = $.extend(defaults, options);

if($(this).data("t_keepalive")!==undefined){
opts.keepAlive=true;
}

if($(this).data("t_offset")!==undefined){
opts.edgeOffset=$(this).data("t_offset");	
}

if($(this).data("t_white")!==undefined){
var suf="_w";	
var osuf="_white"; //all this is necessary to use classes instead of ids for unique tooltips to exist
}
else{
var suf="";
var osuf="_normal";
}

if($(this).data("t_unique")!==undefined){
var c=retcount();
suf+="unique_"+c;
$(this).attr("data-js-id",suf);
}

	 	// Setup tip tip elements and render them to the DOM
	 	if($("#tiptip_holder"+suf).length <= 0){
	 		var tiptip_holder = $('<div id="tiptip_holder'+suf+'" style="max-width:'+ opts.maxWidth +';" class="tiptip_holder'+osuf+'"></div>');
			var tiptip_content = $('<div id="tiptip_content'+suf+'" class="tiptip_content tiptip_content'+osuf+'"></div>');
			var tiptip_arrow = $('<div id="tiptip_arrow'+suf+'" class="tiptip_arrow'+osuf+'"></div>');
			var tiptip_arrowb = $('<div id="tiptip_arrowb'+suf+'" class="tiptip_arrow_bottom'+osuf+'"></div>');
			$("body").append(tiptip_holder.html(tiptip_content).prepend(tiptip_arrow.html('<div id="tiptip_arrow_inner'+suf+'" class="tiptip_arrow_inner'+osuf+'"></div>').append(tiptip_arrowb.html('<div id="tiptip_arrow_innerb'+suf+'" class="tiptip_arrow_inner_bottom'+osuf+'"></div>'))));
		} 


			var tiptip_holder = $("#tiptip_holder"+suf);
			var tiptip_content = $("#tiptip_content"+suf);
			var tiptip_arrow = $("#tiptip_arrow"+suf);
			var tiptip_arrowb = $("#tiptip_arrowb"+suf);
	
		return this.each(function(){
			var org_elem = $(this);

			if(opts.content){
				var org_title = opts.content;
			} else {
				var org_title = org_elem.attr(opts.attribute);
			}
			if(org_title != ""){
					//rfd ready for deactivation
					$(org_elem).attr("data-t_rfd","t");
					org_elem.removeAttr(opts.attribute); //remove original Attribute
			
				var timeout = false;

				
				if(opts.activation == "hover"){
					$(org_elem).bind("click",function(){
					if($(org_elem).parents(".tiptip_holder").length!=0){
					$(org_elem).parents(".tiptip_holder").css("display","none");
					}
					deactive_tiptip();	
					});
				
					org_elem.hover(function(){
						active_tiptip();
					}, function(){
					var ver=$(org_elem).attr("data-t_a_id");
					if(ver!==undefined){
						if(window[$(org_elem).attr("data-t_a_id")]){
					window[$(org_elem).attr("data-t_a_id")].abort();
						}
					}
							deactive_tiptip();
					});
					
				

					if(opts.keepAlive){
					tiptip_holder.bind("custom_mouseleave", function(){ 
					
						if(lastt=="t"){return false;}
						else{
							deactive_tiptip();
						}
					});

					tiptip_holder.bind("mouseleave",function(){
					tiptip_holder.trigger("custom_mouseleave");
					});

						$(org_elem).hover(function(){
							if(($(org_elem).attr("data-t_noloading")=="t" && $(org_elem).attr("data-t_loaded")=="t") || $(org_elem).attr("data-t_noloading")===undefined)
							{active_tiptip();}},function(){
					if(eval($(org_elem).attr("data-t_a_id"))){
					window[$(org_elem).attr("data-t_a_id")].abort();
					}
					deactive_tiptip();
					

						});
				
		
						tiptip_holder.mouseenter(function(){
							$(tiptip_holder).css("display","block");
							});
						
							
							

					}
				} else if(opts.activation == "focus"){
					org_elem.focus(function(){
						active_tiptip();
					}).blur(function(){
						deactive_tiptip();
					});
				} else if(opts.activation == "click"){
					org_elem.bind("click",function(){
						active_tiptip();
					
					});
					org_elem.bind("hover",function(){},function(){
						if(!opts.keepAlive){
							deactive_tiptip();
						}
					});
					if(opts.keepAlive){
						tiptip_holder.hover(function(){}, function(){
							deactive_tiptip();
						});
					}
				}
			
			var fjax_click=false;
			
				function active_tiptip(){
					if($(org_elem).attr("data-t_stopit")=="t"){
					deactive_tiptip();	
					return false;
					}
					if($(org_elem).attr("data-t_rfd")===undefined){
					deactive_tiptip();	
					return false;
					}
					if($(org_elem).attr("data-t_loaded")===undefined){
					$(org_elem).attr("data-t_loaded","f");	
					}
					
					fjax_click=false;
				if($(org_elem).data("t_fjax")===undefined){
					//&& $(org_elem).data("t_autoload")!==undefined
				$(org_elem).attr("data-t_loaded","f");
				}
				$(org_elem).attr("data-t_tipped","t");
	

					opts.enter.call(this);
					if($(org_elem).attr("data-t_loaded")=="t" || $(org_elem).attr("data-t_noloading")=="t"){}
					else{
				
					if($(org_elem).next(".tooltip_text").length>0 && $(org_elem).attr("data-t_reload")=="t"){
					org_title=$(org_elem).next(".tooltip_text").html();	
					$(org_elem).attr("data-t_reload","f");
					}
					
					tiptip_content.html(org_title);
					if($(org_elem).data("t_fjax")===undefined){
					$(org_elem).attr("data-t_loaded","t");
					}
					}
					tiptip_holder.hide().removeAttr("class").css("margin","0");
					
				

					tiptip_arrow.removeAttr("style");
					tiptip_arrowb.removeAttr("style");

	

					$(org_elem).attr("data-t_ttipped","t");
					$(org_elem).attr("data-t_suf",suf);
					
				
					if($(org_elem).data("t_fjax")!==undefined && $(org_elem).prev(".t_ajaxified").eq(0).attr("ajaxified")===undefined){
					var a_id="t_a_id"+retcount();
					$(org_elem).attr("data-t_a_id",a_id);
					$(org_elem).before('<div style="display:none;" data-a_id="'+a_id+'" class="t_ajaxified" data-a_custom_f="tooltip_ajaxified" fjax="'+$(org_elem).data("t_fjax")+'"></div>');
					
					if($(org_elem).attr("data-t_save")!==undefined){
					$(org_elem).prev(".t_ajaxified").eq(0).attr("data-a_t_save",$(org_elem).attr("data-t_save"));
					$(org_elem).prev(".t_ajaxified").eq(0).data("a_secondary_e",$(org_elem));
		
					}
								
					fjax_click=true;
			
					}
					else if($(org_elem).data("t_fjax")!==undefined && $(org_elem).attr("data-t_save")===undefined){
	if($(org_elem).attr("data-t_loaded")=="f"){
					fjax_click=true;
							
	}

	
	}
		else if($(org_elem).attr("data-t_autoload")=="t"){
tiptip_content.html($(org_elem).next(".tooltip_text").html());
	}

					
					if($(org_elem).data("t_fjax")!==undefined){
				//	return false;
					}
					
						
					var top = parseInt(org_elem.offset().top);
						var left = parseInt(org_elem.offset().left);
					if(top==0){
					top=$(org_elem).data("t_top");	
					}
					else{
					$(org_elem).data("t_top",top);	
					}
					if(left==0){
					left=$(org_elem).data("t_left");	
					}
					else{
					$(org_elem).data("t_left",left);	
					}
	
				
				
					var org_width = parseInt(org_elem.outerWidth());
					var org_height = parseInt(org_elem.outerHeight());
					var tip_w = tiptip_holder.outerWidth();
					var tip_h = tiptip_holder.outerHeight();
					
			
					
					if($(org_elem).data("t_topleft")===undefined && $(org_elem).data("t_bottomright")===undefined){
					var w_compare = Math.round((org_width - tip_w) + 3);
					}
					else{var w_compare = -2;}
					if($(org_elem).data("t_align")!==undefined){
					var w_compare= Math.round((org_width - tip_w) / 2);
					}

					
					var h_compare = Math.round((org_height - tip_h) / 2);
					var marg_left = Math.round(left + w_compare);
					var marg_top = Math.round(top + org_height + opts.edgeOffset);
				
					if($(org_elem).data("t_position")=="left" && $(org_elem).data("t_align")=="center"){
					var marg_top=marg_top-org_height;
				
					}
					var t_class = "";
					var arrow_top = "";
				
					if($(org_elem).data("t_align")!==undefined){
						var minus=5;
						}
					else{
					if($(org_elem).data("t_position")=="bottom"){
					var minus=3;	
					}
					else{	
					var minus=4;
					}
					}
			
					if($(org_elem).data("t_topleft")===undefined && $(org_elem).data("t_bottomright")===undefined){
					var arrow_left = Math.round(tip_w - 12) - minus;
					}
					else{var arrow_left = minus;}
						if($(org_elem).data("t_align")!==undefined){
						var arrow_left = Math.round((tip_w - 12) / 2);
						}

                    if(opts.defaultPosition == "bottom"){
                    	t_class = "_bottom";
                   	} else if(opts.defaultPosition == "top"){ 
                   		t_class = "_top";
                   	} else if(opts.defaultPosition == "left"){
                   		t_class = "_left";
                   	} else if(opts.defaultPosition == "right"){
                   		t_class = "_right";
                   	}
					
					var right_compare = (w_compare + left + 5) < parseInt($(window).scrollLeft());
					var left_compare = (tip_w + left + 5) > parseInt($(window).width());
					
					if((right_compare && w_compare < 0) || (t_class == "_right" && !left_compare) || (t_class == "_left" && left < (tip_w + opts.edgeOffset + 5))){
						t_class = "_right";
						arrow_top = Math.round(tip_h - 13) / 2;
						arrow_left = -12;
						marg_left = Math.round(left + org_width + opts.edgeOffset);
						marg_top = Math.round(top + h_compare);
					} else if((left_compare && w_compare < 0) || (t_class == "_left" && !right_compare)){
						t_class = "_left";
						arrow_top = Math.round(tip_h - 13) / 2;
						arrow_left =  Math.round(tip_w);
						marg_left = Math.round(left - (tip_w + opts.edgeOffset + 5));
						marg_top = Math.round(top + h_compare);
						
					if($(org_elem).data("t_position")=="left" && $(org_elem).data("t_align")=="center"){
					marg_top=marg_top-org_height;
					marg_left=marg_left-1;
					}
					else{
					marg_left=marg_left-1;
					}
					
					if($(org_elem).data("t_arrowtop")!==undefined && $(org_elem).data("t_img")!==undefined){
		
		
		
					}

					}
					
			
					var ft_class=t_class;

					if($(org_elem).attr("data-t_s_top")!==undefined){
					var s_top=50;	
					}
					else{
					var s_top=5;	
					}
					var top_compare = (top + org_height + opts.edgeOffset + tip_h + s_top) > parseInt($(window).height() + $(window).scrollTop());
					var bottom_compare = ((top + org_height) - (opts.edgeOffset + tip_h + s_top)) < 0;
					
					if(top_compare || (t_class == "_bottom" && top_compare) || (t_class == "_top" && !bottom_compare)){
						
						
						if(t_class == "_top" || t_class == "_bottom"){
							arrow_top = tip_h;
							t_class = "_top";
							marg_top = Math.round(top - (tip_h + 5 + opts.edgeOffset));
						} else {
							//casos de left_top o left_bottom por ej - se suma org_height..
							arrow_top = tip_h-(org_height/2)-7;
							marg_top = Math.round((top + org_height) - (tip_h + 5 + opts.edgeOffset));
							t_class = t_class+"_top";
						}
					
					
					} else if(bottom_compare | (t_class == "_top" && bottom_compare) || (t_class == "_bottom" && !top_compare)){
								
						if(t_class == "_top" || t_class == "_bottom"){
							arrow_top = -6;
							t_class = "_bottom";
							marg_top = Math.round(top + org_height + opts.edgeOffset );
						} else {
							arrow_top = (org_height/2)-1;
							marg_top = Math.round(top + opts.edgeOffset );
							t_class = t_class+"_bottom";
						}
						
					}
				
					if(t_class == "_right_top" || t_class == "_left_top"){
						marg_top = marg_top + 5;
					} else if(t_class == "_right_bottom" || t_class == "_left_bottom"){		
						marg_top = marg_top - 5;
					}
					if(t_class == "_left_top" || t_class == "_left_bottom"){	
						marg_left = marg_left - 3;
					}
					
					if($(org_elem).data("t_white")!==undefined){
	
					}
					
					tiptip_arrow.css({"margin-left": arrow_left+"px", "margin-top": arrow_top+"px"});
		
					tiptip_holder.css({"margin-left": marg_left+"px", "margin-top": marg_top+"px"}).attr("class","tip"+t_class);
					
		
					tiptip_holder.addClass("tiptip_holder"+osuf);
					
					if($(org_elem).attr("data-t_nopadding")=="t"){
					tiptip_holder.find(".tiptip_content").css("padding","0");
					}
					else{
					tiptip_holder.find(".tiptip_content").css("padding","");	
					}

					if($(org_elem).data("t_fixed")!==undefined){
					tiptip_holder.addClass("tiptip_fixed");
					}
					else{
					tiptip_holder.removeClass("tiptip_fixed");
					}

		

					if($(org_elem).attr("data-t_loaded")=="f" && $(org_elem).attr("data-t_noloading")=="t"){
						
					tiptip_holder.addClass("hidden_sb");
					}
					else{
					tiptip_holder.removeClass("hidden_sb");	
					}
			
				
					tiptip_holder.addClass("tiptip_holder");
	
					if($(org_elem).attr("data-t_class")!==undefined){
					tiptip_holder.addClass($(org_elem).attr("data-t_class"));
					
					}



					if($(org_elem).attr("data-t_extendedarrow")!==undefined){
			
					if(ft_class=="_left"){var c="tooltip_extended_arrow_left";}
					else if(ft_class=="_right"){var c="tooltip_extended_arrow_right";}
					
					tiptip_holder.addClass(c);
					}


					if (timeout){ clearTimeout(timeout); }
					if($(org_elem).attr("data-t_fadein")!==undefined){
				
					opts.fadeIn=200;
					}
					timeout = setTimeout(function(){ tiptip_holder.stop(true,true).fadeIn(opts.fadeIn); }, opts.delay);	
			
					if(fjax_click){
					$(org_elem).prev(".t_ajaxified").eq(0).click();
					}

	
				}
				
				function deactive_tiptip(){
					$(org_elem).attr("data-t_loaded","f");
					opts.exit.call(this);
					if (timeout){ clearTimeout(timeout); }
					tiptip_holder.fadeOut(opts.fadeOut);
				}
			}				
		});
	}
})(jQuery);