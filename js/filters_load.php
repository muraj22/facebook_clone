<?php
$sechov='';
$sechov.='
var tocheck="[data-f_type="+filter+"]:last";
$(delem).find(tocheck).addClass("filter_selected_v");
if(!from_nf){
if(filter!="custom"){
$(delem).find(tocheck).removeClass("filter_unselected"); 
}
}
$(delem).find(tocheck).find(".filter_selected_wrapper").removeClass("hidden_sb");
if(!in_array(filter,filters_frame)){
frame=1;
}
if(filter!="normal" || tilt_shift==1){
$(delem).find(".filter:last").addClass("filter_active");
}
else{
$(delem).find(".filter:last").removeClass("filter_active");	
}
$(delem).find(".filter_options").find("input[name=new_filter]").val(filter);
$(delem).find(".filter_options").find("input[name=frame]").val(frame);
$(delem).find(".filter_options").find("input[name=frame_original]").val(frame);
$(delem).find(".filter_options").find("input[name=tilt_shift]").val(tilt_shift);
$(delem).find(".filter_options").find("input[name=tilt_shift_original]").val(tilt_shift);
if(frame==2){
$(delem).find(".marco").removeClass("marco_active");
}else{
$(delem).find(".marco").addClass("marco_active");	
}
if(tilt_shift==1){
$(delem).find(".drop").addClass("drop_active");
}else{
$(delem).find(".drop").removeClass("drop_active");	
}
if(filter=="custom"){
$(delem).find(".colorpickers").addClass("colorpickers_active");	
}else{
$(delem).find(".colorpickers").removeClass("colorpickers_active");	
}
if(brightness==1){
$(delem).find(".brightness").removeClass("brightness_active");
$(delem).find(".brightness_slider").slider("option","value",0);
$(delem).find("input[name=brightness]").val("0");
}else{
$(delem).find(".brightness").addClass("brightness_active");
$(delem).find(".brightness_slider").slider("option","value",total_brightness);
$(delem).find("input[name=brightness]").val(total_brightness);
}
if(contrast==1){
$(delem).find(".contrast").removeClass("contrast_active");
$(delem).find(".contrast_slider").slider("option","value",0);
$(delem).find("input[name=contrast]").val("0");
}else{
$(delem).find(".contrast").addClass("contrast_active");
$(delem).find(".contrast_slider").slider("option","value",total_contrast);
$(delem).find("input[name=contrast]").val(total_contrast);
}

';
?>