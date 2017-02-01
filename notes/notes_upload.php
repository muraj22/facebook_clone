<?php
include("start.php");
?>
<?php

include("start.php");
?>
<?php
echo'<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.notes_upload{
    background: none repeat scroll 0% 0% rgb(247, 247, 247);
    color: rgb(51, 51, 51);
    font-size: 11px;
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    margin: 0px;
    overflow-y: scroll;}
	img{border:0 none;}
</style>
		<script type="text/javascript" src="/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery-ui.min.js"></script>
</head>
<body class="notes_upload">
<script type="text/javascript">
function run_upload(){
$("#form_upload").css("display","none");
$("#progress").css("display","block");
var xhrq = new XMLHttpRequest();
	var form = new FormData(); 
	var file = $("#noteid").val();		
	form.append("noteid", file);
	var file = $("#aid").val();
	form.append("aid", file);
	var file = $("#submit2").val();
	form.append("submit2", file);

	var file = document.getElementById("file1").files[0];
	form.append("uploadedfile[]", file);

		
	     xhrq.onreadystatechange = function(){            
            if (xhrq.readyState == 4){

                $("#updater").append(xhrq.responseText); 
var aid=$("#aid").val();
aid=parseInt(aid);
aid=aid+1;
$("#aid").val(aid);
$("#file1").val("");
$("#progress").css("display","none");
$("#form_upload").css("display","block");
			}
        };

	xhrq.open("POST", "notes_uploadf.php");
	xhrq.send(form);	
}
</script>
<div style="margin: 0px; padding: 10px 0px;" id="form_upload">
<form style="margin:0;padding:0;display:inline-block;">
<input type="file" id="file1" name="file1" onchange="run_upload();">
<input type="hidden" id="noteid">
<input type="hidden" id="submit2">
<input type="hidden" id="aid">
</form>
</div>
<script type="text/javascript">';
$noteid=$_GET['note_id'];
echo'
$("#noteid").val("'.$noteid.'");
</script>
<div style="padding-top: 15px;margin: 0px;display:none;" id="progress">
<img src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16" style="margin-right: 10px;">Uploading photo...
</div>
<div id="updater" style="display:none;">

</div>
</body>
</html>';
?>
<?php include("end.php"); ?>