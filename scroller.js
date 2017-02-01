var lastfade=false;
var fadescrt=false;
function setSlider($scrollpane,dtop,bottom,extra_func){//$scrollpane is the div to be scrolled
if(!dtop){dtop="27px";}

if(bottom=="same"){
		var okas=$scrollpane.find(".slider-vertical").slider("value");
		if(typeof(okas)=="object"){okas=1;}
		okas=parseInt(okas);
}
	//set options for handle image - amend this to true or false as required
	var handleImage = true;
	
	//change the main div to overflow-hidden as we can use the slider now
	$scrollpane.css('overflow','hidden');
	
	//if it's not already there, wrap an extra div around the scrollpane so we can use the mousewheel later
	if ($scrollpane.parent('.scroll-container').length==0) $scrollpane.wrap('<\div class="scroll-container"> /');
	//and again, if it's not there, wrap a div around the contents of the scrollpane to allow the scrolling
	if ($scrollpane.find('.scroll-content').length==0) $scrollpane.children().wrapAll('<\div class="scroll-content" style="position:relative;"> /');
	
	//compare the height of the scroll content to the scroll pane to see if we need a scrollbar
	var difference = $scrollpane.find('.scroll-content').height()-$scrollpane.height();//eg it's 200px longer 
	$scrollpane.data('difference',difference); 



	if(difference<=0 && $scrollpane.find('.slider-wrap').length>0)//scrollbar exists but is no longer required
	{
		$scrollpane.find('.slider-wrap').remove();//remove the scrollbar
		$scrollpane.find('.scroll-content').css("top","0");//and reset the top position
	}
	
////alert($scrollpane.height());
	if(difference>0)//if the scrollbar is needed, set it up...
	{

		var proportion = difference / $scrollpane.find('.scroll-content').height();//eg 200px/500px
		
		var handleHeight = Math.round((1-proportion)*$scrollpane.height());//set the proportional height - round it to make sure everything adds up correctly later on
		handleHeight -= handleHeight%2; 
		
		//if the slider has already been set up and this function is called again, we may need to set the position of the slider handle
		var contentposition = $scrollpane.find('.scroll-content').position();	
		var sliderInitial = 100*(1-Math.abs(contentposition.top)/difference);

		if($scrollpane.find('.slider-wrap').length==0)//if the slider-wrap doesn't exist, insert it and set the initial value
		{
			$scrollpane.append('<\div class="slider-wrap"><\div class="slider-vertical"><\/div><\/div>');//append the necessary divs so they're only there if needed
		}
		
		$scrollpane.find('.slider-wrap').height($scrollpane.height());//set the height of the slider bar to that of the scroll pane
		sliderInitial = 100;
		
		//set up the slider 
		$scrollpane.find('.slider-vertical').slider({
			orientation: 'vertical',
			min: 0,
			max: 100,
			range:'min',
			value: sliderInitial,
			slide: function(event, ui) {
				var topValue = -((100-ui.value)*difference/100);
			
					
				$scrollpane.find('.scroll-content').css("top",topValue+"px");//move the top up (negative value) by the percentage the slider has been moved times the difference in height
			
				$('ui-slider-range').height(ui.value+'%');//set the height of the range element
			},
			change: function(event, ui) {
				var topValue = -((100-ui.value)*($scrollpane.find('.scroll-content').height()-$scrollpane.height())/100);//recalculate the difference on change
				$scrollpane.find('.scroll-content').css("top",topValue+"px");//move the top up (negative value) by the percentage the slider has been moved times the difference in height
				$('ui-slider-range').height(ui.value+'%');
				if(extra_func){
				window[extra_func](event,$scrollpane,ui.value);
				}
		  }	  
		});
		
		//set the handle height and bottom margin so the middle of the handle is in line with the slider
		$scrollpane.find(".ui-slider-handle").css({height:handleHeight,'margin-bottom':-0.5*handleHeight});
		var origSliderHeight = $scrollpane.height();//read the original slider height
		var sliderHeight = origSliderHeight - handleHeight ;//the height through which the handle can move needs to be the original height minus the handle height
		var sliderMargin =  (origSliderHeight - sliderHeight-9)*0.5;//so the slider needs to have both top and bottom margins equal to half the difference
		$scrollpane.find(".ui-slider").css("height",sliderHeight+"px");
		$scrollpane.find(".ui-slider").css("margin-top",sliderMargin+"px");//set the slider height and margins
		$scrollpane.find(".ui-slider-range").css("bottom","-"+sliderMargin+"px");//position the slider-range div at the top of the slider container
		
		//if required create elements to hold the images for the scrollbar handle
		if (handleImage){
			$scrollpane.find(".scrollbar-bottomv").remove();
			$scrollpane.find(".scrollbar-grip").remove();
			$scrollpane.find(".ui-slider-handle").append('<img class="scrollbar-bottomv" src="/images/scrollbar-handle-bottomv.png"/>');

			$scrollpane.find(".ui-slider-handle").append('<img class="scrollbar-grip" src="/images/scrollbar-handle-middle.png"/>');
		}
	}//end if
		 
	//code for clicks on the scrollbar outside the slider
	$(".ui-slider").click(function(event){//stop any clicks on the slider propagating through to the code below
		event.stopPropagation();
	});
	   
	$(".slider-wrap").click(function(event){//clicks on the wrap outside the slider range
		var offsetTop = $(this).offset().top;//read the offset of the scroll pane
		var clickValue = (event.pageY-offsetTop)*100/$(this).height();//find the click point, subtract the offset, and calculate percentage of the slider clicked
		$(this).find(".slider-vertical").slider("value", 100-clickValue);//set the new value of the slider
	}); 
	
	
		$(".ui-slider-handle").removeAttr("href");
		$(".ui-slider-handle").css("cursor","default");
		$(".ui-slider-range").css("border","0");
		$(".ui-slider-range").css("background","#ffffff");
	// $(".slider-wrap").css("background","#ffffff");
		$(".slider-wrap").css("border","0");
	// $(".ui-slider-handle").css("opacity","0");
			$(".scrollbar-bottomv").mousedown(function(event){
		event.stopPropagation();
	});

			$(".ui-slider-range").mousedown(function(event){
		event.stopPropagation();
	});
	
	
$scrollpane.find(".slider-wrap").css("right","0");
$scrollpane.find(".slider-wrap").css("top",dtop);
var delem=$scrollpane;
$(delem).find(".slider-wrap,.slider-vertical,.ui-slider-range").addClass("transparentbackround");
$(delem).find(".ui-slider-handle").css("background","lightgrey");
$(delem).find(".scrollbar-bottomv").remove();

if($scrollpane.html()==""){
$scrollpane.parent().eq(0).css("position","absolute");	
}


if(bottom=="bottom"){
$(delem).find(".slider-vertical").slider("value", 0);
}

if(bottom=="same"){
$scrollpane.find(".slider-vertical").slider("value", okas);	
}
//ver si en gallery viewer con comments esta todo correcto a pesar de lo de arriba.

				$(document).on("mouseover",".slider-wrap",function(event){
clearTimeout(fadescrt);
$(this).find(".ui-slider-handle").css("opacity","1");
$(this).addClass("ison");
		});	
	
					$(document).on("mouseout",".slider-wrap",function(event){
						clearTimeout(fadescrt);
						var thisv=$(this);
						$.doTimeout(750,function(){
						$(thisv).removeClass("ison");
						});
						lastfade=$(this);
				fadescrt=setTimeout("fadescr()",3000);
	});	
		 
	//additional code for mousewheel
	if($.fn.mousewheel){		
	
		$scrollpane.parent().unmousewheel();//remove any previously attached mousewheel events
		$scrollpane.parent().mousewheel(function(event, delta){
			
			var speed = Math.round(5000/$scrollpane.data('difference'));
			if (speed <1) speed = 1;
			if (speed >100) speed = 100;
	
			var sliderVal = $(this).find(".slider-vertical").slider("value");//read current value of the slider
			
			sliderVal += (delta*speed);//increment the current value
	 
			$(this).find(".slider-vertical").slider("value", sliderVal);//and set the new value of the slider
			
			event.preventDefault();//stop any default behaviour
		});
		
	}
	
}