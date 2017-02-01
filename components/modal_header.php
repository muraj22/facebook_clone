<?php
$sechov='
<div id="ds_wrapper" style="width:100%;left:-11px;height:0;padding:0;margin:0 auto;position:relative;">


<div style="width:100%;height:0;padding:0;z-index:302;margin:0 auto;position:absolute;z-index:602;">


<div id="d_clone" style="display:none">
<div style="margin:0 auto;position:relative;width:550px;" class="clone_loading_wrapper">
<div class="dialog_remover"></div>
<div class="pop_container3" id="loading_d" style="height:auto;display:none;position:fixed;margin:0 auto;margin-top:125px;width:550px;">
<div class="loading_div_dialog">Loading...</div>
</div>
</div>


<div style="margin:0 auto;width:550px;position:relative;" class="clone_container_wrapper">
<div class="dialog_remover"></div>
<div class="pop_container3 esc_container" id="d_container" style="width:550px;height:auto;margin:0 auto;margin-top:125px;display:none;position:fixed;">
<div class="div_dialog_header3" id="d_title">Edit Tags</div>
<div class="div_dialog_body3" id="d_body" style="height:auto;"></div>
<div class="div_dialog_footer3" style="height:28px;" id="d_footer">
<label class="uiOverlayButton uiButton uiButtonConfirm uiButtonLarge" id="d_label_confirm"><input autocomplete="off" type="button" id="d_button_confirm" class="uiButtonText"></label><label class="uiOverlayButton uiButton uiButtonLarge" id="d_label_cancel"><input autocomplete="off" type="button" id="d_button_cancel" class="uiButtonText"></label>
</div>
</div>
</div>


</div>



</div>

</div>';

$sechov.='
<script type="text/javascript">
function clone_dialog(prefix,id){

var id="_"+prefix+id;

var ret=$("#d_clone").html();
ret=ret.replace("loading_d","loading_d"+id)
ret=ret.replace("d_container","d_container"+id)
ret=ret.replace("d_title","d_title"+id);
ret=ret.replace("d_body","d_body"+id);
ret=ret.replace("d_footer","d_footer"+id);
ret=ret.replace("d_label_confirm","d_label_confirm"+id);
ret=ret.replace("d_button_confirm","d_button_confirm"+id);
ret=ret.replace("d_label_cancel","d_label_cancel"+id);
ret=ret.replace("d_button_cancel","d_button_cancel"+id);

$("#d_clone").after(ret);

}

</script>
<div id="ajax_container" style="display:none;">

</div>';
?>