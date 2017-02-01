<?php
include("headerjs.php");
?>
if(wire_settoport){$(window).unbind("resize",wire_settoport);}

function isset () {
    var a = arguments,
        l = a.length,        i = 0,
        undef;
 
    if (l === 0) {
        throw new Error('Empty isset');    }
 
    while (i !== l) {
        if (a[i] === undef || a[i] === null) {
            return false;        }
        i++;
    }
    return true;
}
(function($){
	
	$.extend($.fn,{
		tag: function(options) {

			var defaults = {
				minWidth: 50,
				minHeight : 50,
				defaultWidth : 50,
				defaultHeight: 50,
				maxHeight : null,
				maxWidth : null,
				save : null,
				remove: null,
                list: null,
				canTag: true,
				canDelete: true,
				autoShowDrag: false,
				autoComplete: null,
				defaultTags: null,
				clickToTag: true,
				draggable: null,
				resizable: true,
				showTag: 'hover',
				showLabels: true,
				debug: false,
        clickable: false,
        click: null
			};
			
			var options = $.extend(defaults, options);  

			return this.each(function() {
				
				var obj = $(this);
				
				obj.data("options",options);
				
				/* we need to wait for load because we need the img to be fully loaded to get proper width & height */
				

				$(document).ready(function(){


					container = obj.parent().parent(); 
					overlay = obj.prev();
              
					
					obj.parent().width(obj.width());
					obj.parent().height(obj.height());
					
					obj.parent().parent().width(obj.width());
					
            
					
					if(options.autoShowDrag){
						obj.showDrag();
					}
                    
                    $(".jTagSaveBtn").click(function(){//alert(2);
				
                var thisv=$(".jTagSave"); 
                
				label = $("#jTagLabel").val(); 
				
				if(label==''){
					//alert('The label cannot be empty');
					return;
				}
				
                var imgw=document.getElementById("nphoto").clientWidth;
                var imgh=document.getElementById("nphoto").clientHeight;
             
				height = 50;
                height=height*100/imgh;
				width = 50;
				width=width*100/imgw;
          
                
                var off_top_cuadradito = $(thisv).parent().parent().offset().top;
                var off_top_image = $("#nphoto").offset().top;
                
                top_pos=off_top_cuadradito-off_top_image;
                
				var off_left_cuadradito = $(thisv).parent().parent().offset().left;
                var off_left_image = $("#nphoto").offset().left;
                
                left=off_left_cuadradito-off_left_image;
                
				var cuidvjs=document.getElementById('love').value;	
                
				tagobj = obj.addTag('50','50',top_pos,left,label);
                
                top_pos=top_pos+25;
                left=left+25;
                
                var thetable=$("#thetable").val();	
               
				var thephotol=$("#thephotol").val();
				var thephotom=$("#thephotom").val();
				var thephoto=$("#thephoto").val();
       //alert(thephoto);
                var dheight=$("#nphoto").css("height");
                dheight=dheight.replace("px","");
                dheight=parseInt(dheight);
                hper=top_pos*100;
                
                hper=hper/dheight;
                top_pos=hper;
                

			
                var dwidth=$("#nphoto").css("width");
                dwidth=dwidth.replace("px","");
                dwidth=parseInt(dwidth);
                wper=left*100;
                wper=wper/dwidth;
                left=wper;
                


                
				if(options.save){
                obj.hideDrag();
	                var albumid=$("#selected_album").val();
                   
					options.save(width,height,top_pos,left,label,cuidvjs,thetable,thephotol,thephotom,thephoto,albumid,tagobj);
                    var prectot=$("#prectot").val();
                    var toteti=$("#toteti"+prectot).val();
                    toteti=parseInt(toteti);
                    toteti=toteti+1;
                    $("#toteti"+prectot).val(toteti);
                    $("#ctotv"+prectot).html(toteti);
                    $("#ctot"+prectot).removeClass("ctot");
                    $("#ctot"+prectot).addClass("ctotv");
                    $("#love").val("");
                    showopv();
				}
				
			});
			
				
					container.delegate('.jTagTag','mouseenter',function(){
						if($(".jTagDrag",container).length==0){
							$(this).css("opacity",1);
              if(options.canDelete){
                $(".jTagDeleteTag",this).show();
              }							
							$(this).find("span").show();
							
						}
					});
					
					container.delegate('.jTagTag','mouseleave',function(){
						if($(".jTagDrag",container).length==0){
							if(options.showTag == 'hover'){
								$(this).css("opacity",0);
                if(options.canDelete){
                  $(".jTagDeleteTag",this).hide();
                }
								$(this).find("span").hide();
							}
							obj.enableClickToTag();
						}
					});
					
					if(options.showLabels && options.showTag != 'always'){
					
						container.delegate('.jTagLabels label','mouseenter',function(){
							$("#"+$(this).attr('rel'),container).css('opacity',1).find("span").show();
              if(options.canDelete){
                $(".jTagDeleteTag",container).show();
              }
						});
						
						container.delegate('.jTagLabels label','mouseleave',function(){
							$("#"+$(this).attr('rel'),container).css('opacity',0).find("span").hide();
              if(options.canDelete){
                $(".jTagDeleteTag",container).hide();
              }
							
						});
					
					}
					
					if(options.canDelete){
					
						container.delegate('.jTagDeleteTag','click',function(){
							
							/* launch callback */
							if(options.remove){
							var elo=$(this).parent().parent().attr('name');
                            var oelo=$(this).parent().parent().attr('id');
                            oelo=oelo.replace('tag', '');
                            var cuidvjs=$("#otag"+oelo).attr('name');
					
                    var thetable=$("#thetable").val();
                    		
                    options.remove(elo,thetable,cuidvjs);
                    
                   
                   
                    var elov=$(this).parent().parent().attr('id');
                    elov=elov.replace('tag', '');
                    var prectot=$("#prectot").val();
                    var ctoteti=$("#ctoteti"+prectot).val();
                    ctoteti=ctoteti.replace(','+elov,'');
                    $("#ctoteti"+prectot).val(ctoteti);
                    var toteti=$("#toteti"+prectot).val();
                    toteti=parseInt(toteti);
                    toteti=toteti-1;
                    $("#toteti"+prectot).val(toteti);
                    if(toteti=="0"){$("#ctot"+prectot).removeClass("ctotv");
                    $("#ctot"+prectot).addClass("ctot"); $("#ctotv"+prectot).html("");}
                 	else{$("#ctotv"+prectot).html(toteti);}
                    }
							
							/* remove the label */
							if(options.showLabels){
								$(".jTagLabels",container).find('label[rel="'+$(this).parent().parent().attr('id')+'"]').remove();
							}
							
							/* remove the actual tag from dom */
							$(this).parent().parent().remove();

							obj.enableClickToTag();
							
						});
					
					}
          
          if(options.clickable){
						container.delegate('.jTagTag','click',function(){
							/* launch callback */
							if(options.click){
								options.click($(this).find('span').html());
							}
						});
					}
					
					if(options.defaultTags){
						$.each(options.defaultTags, function (index,value){
							obj.addTag(value.width,value.height,value.top,value.left,value.label,value.id);
						});
					}
					
					obj.enableClickToTag();
						
				});
			
			});
		},
		hideDrag: function(){
			var obj = $(this);
			
			var options = obj.data('options');
			
			obj.prev().removeClass("jTagPngOverlay");
			
             $("#typeanynamews").append($("#typeanynamew"));	
             
			obj.parent().parent().find(".jTagDrag").remove();
			
                
			if(options.showTag == 'always'){
				obj.parent().parent().find(".jTagTag").show();
			}
			showopv();
			obj.enableClickToTag();
			
		},
		showDrag: function(e){
			var obj = $(this);
			
			var container = obj.parent().parent();
			var overlay = obj.prev();
			

			
			var options = obj.data('options');
			
			var position = function(context){
				var jtagdrag = $(".jTagDrag",context);
				border =   parseInt(jtagdrag.css('borderTopWidth'));
				left_pos = parseInt(jtagdrag.offset().left) + border;
				top_pos =  parseInt(jtagdrag.offset().top) + border;
				return "-"+left_pos+"px -"+top_pos+"px";
			}
			

			
			if(!options.canTag){
				return;
			}
			
			if(options.showTag == 'always'){
				$(".jTagTag").hide();
			}
					
                          	if($(".jTagDrag").length==1){
                $("#typeanynamews").append($("#typeanynamew"));
				$("#cuadradito").remove();
			}
            
			$('<div style="width:54px;height:54px;border-radius:3px;border:3px solid;border-color:#eeedee #eeedee #eeedee #eeedee;box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);z-index:99;cursor:inherit;" class="jTagDrag" id="cuadradito"></div>').appendTo(overlay);
			
			
		   $("#typeanynamew").css("bottom","-63px");
            $("#cuadradito").append($("#typeanynamew"));
           $.doTimeout(0,function(){
          $("#jTagLabel").val("");
$("#jTagLabel").blur();
$("#jTagLabel").focus();	
      	});
        
    
    		jtagdrag = $(".jTagDrag");
			
					
			jtagdrag.css("position", "absolute");
			
			if(e){
				
				function findPos(someObj){
                
                    var psomeobj;
					var curleft = curtop = 0;
					if (someObj.offsetParent) {
						do {
							curleft += someObj.offsetLeft;
							curtop += someObj.offsetTop;
						} while (someObj = someObj.offsetParent);
						return [curleft,curtop];
					}
				}
				
				/* get real offset */
				pos = findPos(obj.parent()[0]); 

			
             
                
                var te=document.getElementById("uioverlay").scrollTop;
              
                 
				e.pageY=e.pageY+te; 
                
               
                
				x = Math.max(0,e.pageX - pos[0] - (options.defaultWidth / 2 + 6));
             
				y = Math.max(0,e.pageY - pos[1] - (options.defaultHeight / 2 + 6));
                         				
            
                
				if(x + jtagdrag.width() > obj.parent().width()){
					x = obj.parent().width() - jtagdrag.width() - 6;
				}
				
			
				
				if(y + jtagdrag.height() > obj.parent().height()){
					y = obj.parent().height() - jtagdrag.height() - 6;
				}
                
 
			} else {
				
				x = 0;
				y = 0;
				
			}
			jtagdrag.css("display","inline-block");
			jtagdrag.css("top",y) 
						  .css("left",x);
			

			
			$(".jTagSaveClose",container).click(function(){
				obj.hideDrag();
			});
			
			if(options.resizable){
			
				jtagdrag.resizable({
					containment: obj.parent(),
					minWidth: options.minWidth,
					minHeight: options.minHeight,
					maxWidht: options.maxWidth,
					maxHeight: options.maxHeight,
					resize: function(){
						jtagdrag.css({backgroundPosition: position(overlay)});
					},
					stop: function(){
						jtagdrag.css({backgroundPosition: position(overlay)});
					}
				});
			
			}
		
			if(options.draggable){
		
				jtagdrag.draggable({
					containment: obj.parent(),
					drag: function(){
						jtagdrag.css({backgroundPosition: position(overlay)});
					},
					stop: function(){
						jtagdrag.css({backgroundPosition: position(overlay)});
					}
				});
			
			}
			
			jtagdrag.css({backgroundPosition: position(overlay)});
		},
		addTag: function(width,height,top_pos,left,label,id,cuidvjsv){
		
			var obj = $(this);
			
			var options = obj.data('options');

			
if(cuidvjsv===undefined){var cuidvjsv=document.getElementById("love").value;}
if(cuidvjsv==""){
var prectot=$("#prectot").val();
var ctoteti=$("#ctoteti"+prectot).val();

var count=Math.random();
count=count.toString();
count=count.replace(".","");
 

			tag = $('<div class="jTagTag hidden_sb" id="tag'+count+'"style="width:'+width+'px;padding-left:2px;padding-right:2px;height:'+height+'px;top:'+top_pos+'px;left:'+left+'px;border:0;position:absolute;" name=""><div style="width:100%;height:100%"></div><div style="width:100px;margin:0;padding:0;position:relative;height:0px;left:-25px;" onmouseover="document.getElementById(tag'+count+').style.opacity=\'0\';"><div class="jTagDeleteTag" style="visibility:hidden;" id="tagv'+count+'"></div><div class="jpointer" id="tagvv'+count+'"></div><span id="tagvvv'+count+'" style="padding-left:5px;padding-right:5px;">'+label+'</span></div></div></div>')
						.appendTo(obj.prev());
                        $("#bsaved").val(count);
                        $("#ctoteti"+prectot).val(ctoteti+","+count);
                        var czindex=$("#clicktt"+prectot).css("z-index");
                   		if(czindex=="5"){
                        renewv(prectot);
                        }
                        var czindex=$("#currentp"+prectot).css("z-index");
                        if(czindex=="5"){
                        renew(prectot);
                        }
}
else{
var prectot=$("#prectot").val();
var ctoteti=$("#ctoteti"+prectot).val();

var count=Math.random();
count=count.toString();
count=count.replace(".","");
			tag = $('<div class="jTagTag hidden_sb" id="tag'+count+'"style="width:width:'+width+'px;padding-left:2px;padding-right:2px;height:'+height+'px;top:'+top_pos+'px;left:'+left+'px;border:0;" name=""><div style="width:100%;height:100%"></div><div style="width:100px;margin:0;padding:0;position:relative;height:0px;left:-25px;" onmouseover="document.getElementById(tag'+count+').style.opacity=\'0\';"><div class="jTagDeleteTag" style="visibility:hidden;" id="tagv'+count+'"></div><div class="jpointer" id="tagvv'+count+'"></div><a href="/'+cuidvjsv+'/"><span id="tagvvv'+count+'" style="padding-left:5px;padding-right:5px;">'+label+'</span></a></div></div></div>')
						.appendTo(obj.prev()); 
                        $("#bsaved").val(count);
                        $("#ctoteti"+prectot).val(ctoteti+","+count);
                        var czindex=$("#clicktt"+prectot).css("z-index");
                   		if(czindex=="5"){
                        renewv(prectot);
                        }
                        var czindex=$("#currentp"+prectot).css("z-index");
                        if(czindex=="5"){
                        renew(prectot);
                        }
                
}			
		
			if(id){
				tag.setId(id);
			}
			
			if(options.canDelete){
				obj.parent().find(".jTagDeleteTag").show();
			}
			
			if(options.showTag == "always"){
				$(".jTagTag").css("opacity",1);
			}
			
			if(options.showLabels){
			}
			
			obj.hideDrag();
			
			return tag;
			
		},
		setId: function(id){
return;
		},
		getId: function(id){
return;
		},
		enableClickToTag: function(){
			
			var obj = $(this);
      
			var options = obj.data('options');
			
			if(options.clickToTag){
  obj.parent().unbind("mousedown");
  
				obj.parent().mousedown(function(e){
                var se=e.target;
                if($(se).hasClass("tagoverlay")===true || $(se).hasClass("jTagDrag")===true){
                	clearop();
                    hidepov();
                    clearopv();
					obj.showDrag(e);
}
				});
			}
		},
		disableClickToTag: function(){
			
			var obj = $(this);
			var options = obj.data('options');
			
			if(options.clickToTag){
				obj.parent().unbind('mousedown');
			}
		}
	});
})(jQuery);
<?php include("endf.php"); ?>