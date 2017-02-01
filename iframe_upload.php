<?php
include("start.php");
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.notes_upload{
 display:none;
}
</style>
		<script type="text/javascript" src="/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery-ui.min.js"></script>
</head>
<body class="notes_upload">
<script type="text/javascript">
function esto(form,x,t){
	var xhrq = new XMLHttpRequest();
  xhrq.upload.onprogress = function(e){
            if (e.lengthComputable){
                
				var rog=Math.round(e.loaded/e.total);
				rog=Math.round(rog*100);
		
            }
        };
	

					
	     xhrq.onreadystatechange = function(){            
            if (xhrq.readyState == 4){
			
				var parsed=x+1;
			
                $("#updateu",window.parent.document).append(xhrq.responseText); 
	                 
            if(parsed<t){
var input = parent.document.getElementById("uploadedfile");
var ala=input.files.length-1;
var alav=ala-x;
var per=x*100/ala;
$("#iuploadingv",window.parent.document).css("width",per+"%");
				parent.sendp(parsed,t);}
			else{parent.cleartin(); $("#iuploadingv",window.parent.document).css("width","100%");}
			}
        };
			parent.acas();
	xhrq.open("POST", "add_photos2.php",true);
	xhrq.send(form);
	}
</script>
</body>
</html>
<?php include("end.php"); ?>