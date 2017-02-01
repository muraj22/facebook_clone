<?php
if(isset($_POST['media'])){
    $from_media=2;    
}else{
    $from_media=1;
}
$secho='
    <script type="text/javascript">
    var pin='.$_POST['pin_pagination'].'
    var from_media='.$from_media.';
    </script>
    
<div id="upload_photo_wrapper" style="display:none;">
<input name="uploadedfile[]" class="uploadedfile" id="uploadedfile_adbtn" style="display:none;" type="file" multiple="" style="margin-top:15px;cursor:pointer;"/>

<textarea id="totextarea">
</textarea>
<script type="text/javascript">
var actual_input_file="uploadedfile_adbtn";

if(global_addphotosbutton_loaded===undefined){
var global_addphotosbutton_loaded=true;

var traspass_filesv=function(){
traspass_files();
}


var create_photo_album_nf_handler=function(){
$("#uploadedfile_adbtn").click();
}

$(document).off("click",".addphotos_caller",create_photo_album_nf_handler).on("click",".addphotos_caller",create_photo_album_nf_handler);


function traspass_files(){////alert(9);
$(document).off("click",".addphotos_caller",create_photo_album_nf_handler);
$(".addphotos_caller").wrap(\'<div style="position:relative;"></div>\');
$(".addphotos_caller").css("opacity","0.5");
$(".addphotos_caller").css("cursor","default");
$(".addphotos_caller").after(\'<img width="16" height="11" alt="" class="addphotos_caller_loading" src="/images/jKEcVPZFk-2.gif" style="display:inline-block;border:none;position:absolute;top:50%;left:50%;margin-left:-8px;margin-top:-5px;">\');

//there is global_switch and global_uidv for these settings and addphotos_button_url_suf=

		$.ajax({

	type: "POST",
	url: "/photo_uploader.php"+global_addphotos_button,
	data: {uidv:global_uidv,switch:global_switch,pin:pin,from_media:from_media},
	success: function(response) {
$(document).off("click",".addphotos_caller",create_photo_album_nf_handler).on("click",".addphotos_caller",create_photo_album_nf_handler);

if(response.length>0){
	$(".secondtag").remove();
if(global_switch==0){
$("#secondtagen").html("");
$(".secondtag").remove();
}

$("#firsttagen").html(response);
photos();
				$(".addphotos_caller").css("opacity","1");
$(".addphotos_caller").css("cursor","pointer");
	$(".addphotos_caller_loading").remove();
}
	}
});

}

$(document).on("change","#uploadedfile_adbtn",traspass_filesv);
}
</script>
</div>';

?>