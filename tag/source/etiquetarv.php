<?php
include("headerjs.php");
?>
function f_filterResults(n_win, n_docel, n_body) {
	var n_result = n_win ? n_win : 0;
	if (n_docel && (!n_result || (n_result > n_docel)))
		n_result = n_docel;
	return n_body && (!n_result || (n_result > n_body)) ? n_body : n_result;
}
function f_scrollTop() {
	return f_filterResults (
		window.pageYOffset ? window.pageYOffset : 0,
		document.documentElement ? document.documentElement.scrollTop : 0,
		document.body ? document.body.scrollTop : 0
	);
}
(function($){
	
	$.extend($.fn,{
		tag: function(options) {

			var defaults = {
				minWidth: 100,
				minHeight : 100,
				defaultWidth : 100,
				defaultHeight: 100,
				maxHeight : null,
				maxWidth : null,
				save : null,
				remove: null,
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
					obj.wrap('');
					
					obj.wrap('');
					
					$("").insertAfter(obj.parent());
				
					$('').insertBefore(obj);
					
					container = obj.parent().parent();
					overlay = $("#jTagContainer");
             
					
					obj.parent().width(obj.width());
					obj.parent().height(obj.height());
					
					obj.parent().parent().width(obj.width());
					
            
					
					if(options.autoShowDrag){
						obj.showDrag();
					}
				
					container.delegate('.jTagTagv','mouseenter',function(){
				
							$(this).css("opacity",1);
  			$(this).css("z-index","307");
            
            			
                            
                            var c=$(this).width()/2;
                  
                            var d=$(this).find(".tagName").width();
                       
                            c=c+($(this).find(".tagName").width()/2);
                            
                            
                            
                            $(this).find(".tagName").css("margin-right","-"+c+"px");
                            
							$(this).find("span").show();
							
					
					});
					
					container.delegate('.jTagTagv','mouseleave',function(){
				$(this).css("z-index","206");
								$(this).css("opacity",0);
             
                 		
             
		
							
						
						
					});
                    
                    
                    				container.delegate('.jTagTagv','mousedown',function(e){
				
                              var cpb=$("#photobottom2").css("display");
                if(cpb=="none"){return;}
                
    
                obj.showDrag(e);
				
                	});
					
					if(options.showLabels && options.showTag != 'always'){
					
						container.delegate('.jTagLabels label','mouseenter',function(){
							$("#"+$(this).attr('rel')).css('opacity',1).find("span").show();
              if(options.canDelete){
                $(".jTagDeleteTag").show();
              }
						});
						
						container.delegate('.jTagLabels label','mouseleave',function(){
							$("#"+$(this).attr('rel')).css('opacity',0).find("span").hide();
              if(options.canDelete){
                $(".jTagDeleteTag").hide();
              }
							
						});
					
					}
					
					if(options.canDelete){
					
						container.delegate('.jTagDeleteTag','click',function(){
		  
		            obj.enableClickToTag();
        					
						});
					
					}
          
          if(options.clickable){
						container.delegate('.jTagTagv','click',function(){
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
			

            
            $(".jTagSaveBtn").click(function(){cremove=true; 
			
              
                var tore=$(".jTagSave").parent().parent().attr("id");
                
                var thisv=$(".jTagSave");
				label = $("#jTagLabel").val();  
				
				if(label==''){
					//alert('The label cannot be empty');
					return;
				}
			
				var imgh=document.getElementById("img1").clientHeight;
				var imgw=document.getElementById("img1").clientWidth;
                
                height = $(thisv).parent().parent().height();      
       
				height=height*100/imgh;
              var hh=height/2;
                
                
                width = $(thisv).parent().parent().width();
     
                width=width*100/imgw;
                var hw=width/2;
                
                var off_top_cuadradito = $(thisv).parent().parent().offset().top;
                var off_top_image = $("#img1").offset().top;
                
           
                
                top_pos=off_top_cuadradito-off_top_image;
                
             
                var dheight=$("#img1").css("height");
                dheight=dheight.replace("px","");
                dheight=parseFloat(dheight);
                hper=top_pos*100;
                hper=hper/dheight;
                unmodified_top_pos=hper;
                top_pos=hper+hh;
                

                
				var off_left_cuadradito = $(thisv).parent().parent().offset().left;
                var off_left_image = $("#img1").offset().left;
                
                left=off_left_cuadradito-off_left_image;
                
                var dwidth=$("#img1").css("width");
                dwidth=dwidth.replace("px","");
                dwidth=parseFloat(dwidth);
                wper=left*100;
                
                wper=wper/dwidth;
                unmodified_left=wper;
                left=wper+hw;
                
     
                
				var cuidvjs=document.getElementById('love').value;
                $("#love").val("");	
                var albumid=$("#alb_name").val();
				
        var photoid=$("#thephoto").val();
        photoid=$.trim(photoid);
     
				var flag='r';
              
				if(options.save){
        
	
                     
			
            obj.hideDrag();
         	var dleft=tore;
      		
            
            if(!rfacedet){
        	 $("#"+tore).addClass("hidden_sb");
           	}
            else{afterr=tore+","+afterr; $("#"+tore).addClass("hidden_sb");}
            
               if(tagactive){
               autosearcho=false;
               retag(dleft);
               if(!rfacedet){
               $("#"+tore).addClass("hidden_sb");
               }
               }
               
            rfacedet=true;
             
        	cremove=false;
            
        	var dfn=$(this).attr("data-ts_dfn");
            var dun=$(this).attr("data-ts_dun");
            var dtp=$(this).attr("data-ts_dtp");
            
               				options.save(width,height,top_pos,left,label,cuidvjs,albumid,flag,photoid,dfn,dun,dtp,unmodified_top_pos,unmodified_left);                       
                                        
				}        
				
			});
          });
		},
		hideDrag: function(){
			var obj = $(this);
			
			var options = obj.data('options');
			
			$("#jTagContainer").removeClass("jTagPngOverlay");
			
            $("#typeanynamews").append($("#typeanynamew"));	
			$(".jTagDrag").remove();
			
			if(options.showTag == 'always'){
				$(".jTagTagv").show();
			}
			
			obj.enableClickToTag();
			
		},
		showDrag: function(e){

			var obj = $(this);
	
			var container = $("#jTagContainer");
			var overlay = $("#jTagContainer");
			
			
			
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
				$(".jTagTagv",overlay).hide();
			}
			
            	if($(".jTagDrag",overlay).length==1){
                $("#typeanynamews").append($("#typeanynamew"));
				$("#cuadradito").remove();
			}
            		
			$('<div style="width:94px;height:'+options.defaultHeight+'px;border: 3px solid rgba(255, 255, 255, 0.9);border-radius: 3px 3px 3px 3px;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75), 0px 0px 4px rgba(0, 0, 0, 0.5) inset;z-index:305;cursor:inherit;" class="jTagDrag" id="cuadradito"></div>').prependTo($("#jTagContainer"));
			
            $(".faceBoxActive").removeClass("faceBoxActive");
            $("#typeanynamew").css("bottom","-110px");
            $("#cuadradito").append($("#typeanynamew"));
           $.doTimeout(0,function(){
          $("#jTagLabel").val("");
$("#jTagLabel").blur();
$("#jTagLabel").focus();	
      	});

        
			jtagdrag = $(".jTagDrag",overlay);
			
					
			jtagdrag.css("position", "absolute");
			
			if(e){
				
				function findPos(someObj){
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
				<?php 
				if(isset($_GET['d'])){echo'
				
				';
				}
				else{
				echo'
				var te=f_scrollTop();
                e.pageY=e.pageY-te;
				';	
				}
				?>
              
         
				x = Math.max(0,e.pageX - pos[0] - (options.defaultWidth / 2));
				y = Math.max(0,e.pageY - pos[1] - (options.defaultHeight / 2));
				
				if(x + jtagdrag.width() > $("#jTagContainer").width()){
					x = $("#jTagContainer").width() - jtagdrag.width() - 2;
				}
				
			
				
				if(y + jtagdrag.height() > $("#jTagContainer").height()){
					y = $("#jTagContainer").height() - jtagdrag.height() - 2;
				}

			} else {
				
				x = 0;
				y = 0;
				
			}
			
			jtagdrag.css("top",y)
						  .css("left",x);
			
			


			
			
			
			$(".jTagSaveClose").click(function(){
				obj.hideDrag();
			});
			
			if(options.resizable){
			
				jtagdrag.resizable({
					containment: $("#jTagContainer"),
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
					containment: $("#jTagContainer"),
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

			var count=Math.random();
count=count.toString();
count=count.replace(".","");
          
if(cuidvjsv===undefined){var cuidvjsv=document.getElementById("love").value;}
if(cuidvjsv==""){
var elov=count;
var ctoteti=$("#ctoteti").val();
while(strpos(ctoteti,elov)!==false){			var count=Math.random();
count=count.toString();
count=count.replace(".","");}
			tag = $('<div class="jTagTagv" id="tag'+count+'"style="width:'+width+'px;height:'+height+'px;top:'+top_pos+'%;left:'+left+'%;border:0;" name=""><div style="width:100%;height:100%"><div class="jTagDeleteTag" id="tagv'+count+'" style="visibility:hidden;"></div><div class="jpointer" id="tagvv'+count+'"></div><span id="tagvvv'+count+'" style="padding-left:5px;padding-right:5px;">'+label+'</span></div></div>')
						.appendTo($("#jTagArea"));
                        $("#bsavedv").val(count);
                        $("#ctoteti").val(ctoteti+","+count);
                        var czindex=$("#currentp").css("z-index");

                      
                        
                         
                       
}
else{
var elov=count;
var ctoteti=$("#ctoteti").val();
while(strpos(ctoteti,elov)!==false){var count=Math.random();
count=count.toString();
count=count.replace(".","");}
            tag = $('<div class="jTagTagv" id="tag'+count+'"style="width:'+width+'px;height:'+height+'px;top:'+top_pos+'%;left:'+left+'%;border:0;" name=""><div style="width:100%;height:100%"><div class="jTagDeleteTag" id="tagv'+count+'" style="visibility:hidden;"></div><div class="jpointer" id="tagvv'+count+'"></div><a href="/'+cuidvjsv+'/"><span id="tagvvv'+count+'" style="padding-left:5px;padding-right:5px;">'+label+'</span></a></div></div>')
						.appendTo($("#jTagArea"));
                        $("#bsavedv").val(count);
                        $("#ctoteti").val(ctoteti+","+count);
                        var czindex=$("#currentp").css("z-index");

                        
                         
                        
}			
		
			if(id){
				tag.setId(id);
			}
			
			if(options.canDelete){
				obj.parent().find(".jTagDeleteTag").show();
			}
			
			if(options.showTag == "always"){
				$(".jTagTagvv").css("opacity",1);
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
                var cpb=$("#photobottom2").css("display");
                if(cpb=="none"){return;}
					obj.showDrag(e);
				
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