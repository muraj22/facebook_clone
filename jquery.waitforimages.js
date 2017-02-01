/*
 * waitForImages 1.4.1
 * -------------------
 * Provides a callback when all images have loaded in your given selector.
 * https://github.com/alexanderdickson/waitForImages
 *
 * Copyright (c) 2012 Alex Dickson
 * Licensed under the MIT license.
 */
(function ($) {
    // Namespace all events.
    var eventNamespace = 'waitForImages';

    // CSS properties which contain references to images. 
    $.waitForImages = {
        hasImageProperties: ['backgroundImage']
    };

    // Custom selector to find `img` elements that have a valid `src` attribute and have not already loaded.
    $.expr[':'].uncached = function (obj) {
        // Ensure we are dealing with an `img` element with a valid `src` attribute.
        if (!$(obj).is('img[src!=""]')) {
            return false;
        }

        // Firefox's `complete` property will always be `true` even if the image has not been downloaded.
        // Doing it this way works in Firefox.
        var img = new Image();
        img.src = obj.src;
        return !img.complete;
    };

    $.fn.waitForImages = function (finishedCallback, eachCallback, waitForAll) {

        var allImgsLength = 0;
        var allImgsLoaded = 0;

        // Handle options object.
        if ($.isPlainObject(arguments[0])) {
            finishedCallback = arguments[0].finished;
            eachCallback = arguments[0].each;
            waitForAll = arguments[0].waitForAll;
        }
var waitForAll="true";

        // Handle missing callbacks.
        finishedCallback = finishedCallback || $.noop;
        eachCallback = eachCallback || $.noop;

        // Convert waitForAll to Boolean
        waitForAll = !! waitForAll;

        // Ensure callbacks are functions.
        if (!$.isFunction(finishedCallback) || !$.isFunction(eachCallback)) {
            throw new TypeError('An invalid callback was supplied.');
        }

        return this.each(function () {
            var obj = $(this);
            var allImgs = [];
            var matchUrl = /url\(\s*(['"]?)(.*?)\1\s*\)/g;

	var bg=obj.find("*").filter(function() {
    return ($(this).css('background-image').length > 0 && $(this).css("background-image")!=="none");
	});

var jc=new Array();
var bgv=new Array();
var ax=0;

var jcv="";
var isgood=false;

$(bg).each(function(){
		
	jcv=$(this).css("background-image");
		
	$(jc).each(function(){
		
	if($(this)[0]==jcv){
	isgood=true;	
	}
	else{
	isgood=false;
	}
	
		});

if(!isgood){ 
	jc[ax]=jcv;
	bgv[ax]=$(this);
	ax++;	
}
	
});

	

	
	var propertyValue="";
	$(bgv).each(function(){
		propertyValue=$(this).css("background-image"); 
		 var element = $(this);

	             while (match = matchUrl.exec(propertyValue)) {
                            allImgs.push({
                                src: match[2],
                                element: element[0]
                            });
                        }
	});
     
               
                obj.find('img:uncached').each(function () {
                    allImgs.push({
                        src: this.src,
                        element: this
                    });
                });

            allImgsLength = allImgs.length;
            allImgsLoaded = 0;

            // If no images found, don't bother.
            if (allImgsLength === 0) {
                finishedCallback.call(obj[0]);
            }

            $.each(allImgs, function (i, img) {
	

                var image = new Image();

                // Handle the image loading and error with the same callback.
                $(image).bind('load.' + eventNamespace + ' error.' + eventNamespace, function (event) {
                    allImgsLoaded++;

                    // If an error occurred with loading the image, set the third argument accordingly.
                    eachCallback.call(img.element, allImgsLoaded, allImgsLength, event.type == 'load');

                    if (allImgsLoaded == allImgsLength) {
                        finishedCallback.call(obj[0]);
                        return false;
                    }

                });

                image.src = img.src;
            });
        });
    };
}(jQuery));