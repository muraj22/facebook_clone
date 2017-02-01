<?php
include("start.php");

include("populate_page.php");
$rhelper_js='../';
$params['style']='<link rel="icon" type="image/png" href="/images/favicon.png">
		<script type="text/javascript" src="/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery-ui.min.js"></script>
			<script type="text/javascript" src="/jquery.ba-dotimeout.min.js"></script>
        <link media="screen" rel="stylesheet" href="/tag/css/jquery-ui.custom.css" type="text/css" />
			<link media="screen" rel="stylesheet" href="/master/stylesheet.php" type="text/css" />';

//vupload.subsbook.com
$echo.='
<script type="text/javascript">
$("body").addClass("upload_giver");

function in_array (needle, haystack, argStrict) {
  var key = "",
    strict = !! argStrict;

  if (strict) {
    for (key in haystack) {
      if (haystack[key] === needle) {
        return true;
      }
    }
  } else {
    for (key in haystack) {
      if (haystack[key] == needle) {
        return true;
      }
    }
  }

  return false;
}

';

include("valid_extensions_js_array.php");
$echo.=$secho;

$echo.='
function video_select_file_basic(w){
var invalidext=false;
var inp = document.getElementById("file_baby");
for (var i = 0; i < inp.files.length; ++i) {
  var name=inp.files.item(i).name;
  var size=inp.files.item(i).size;
}
var ext=name.split(".");
var extl=ext.length;
if(ext.length<=1){invalidext=true;}
else{
var x=0;
$(ext).each(function(){
x++;	
if(x==extl){
	if(!in_array(this,validext)){
	invalidext=true;	
	}
}
});
}


//if file size bigger check it on php - just exit do nothing screen hangs ;)

if(invalidext){
$("#show_invalid_ext",window.parent.document).click();

}
else{
trigger_upload();	
}

}';
$dk_upload=$_GET['dk_upload'];
$dk_upload2=$_GET['dk2_upload'];
$echo.='					
function trigger_upload(){
$("#file_browser").css("display","none");

	var xhrq = new XMLHttpRequest();
	var form = new FormData(); 
	
	var file = "";
	form.append("submit2", file);
	var file = "'.$dk_upload.'";
	form.append("'.ini_get("session.upload_progress.name").'",file);
	var file = "'.$dk_upload2.'";
	form.append("dk2",file);
	var file = document.getElementById("file_baby").files[0];
	form.append("uploadedfile[]", file);


	     xhrq.onreadystatechange = function(){            
            if (xhrq.readyState == 4){
//alert(xhrq.responseText);
                parent.updater_video_upload(xhrq.responseText); 

			}
        };

	xhrq.open("POST", "upload_receiver.php");
	xhrq.send(form);	
	parent.acas();
}
</script>

<form id="upload_form" enctype="multipart/form-data" onsubmit="return " name="upload_form" method="post" action="/video/upload_receiver.php"></form>
<div id="upload_file" style="width:553px;">
<div id="file_browser" class="clearfix">
<input type="file" style="float:left;" id="file_baby" type="file" name="file_baby" onchange="video_select_file_basic(this);">
</div>
<div class="upload_guidelines">
</div>
</div>
';

$params['rhelper_js']='../';
$params['rhelper']='../';
$params['title']='Upfrev';

$params['layout']='';

$page_small_populate="true";

populate_page_small($echo,$params);

include("end.php");
?>