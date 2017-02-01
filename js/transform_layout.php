<?php
include("headerjs.php");
?>
<script type="text/javascript">
function transform_layout(columns,param_style,left_column,right_column,nf_w){
if(columns=="right_column_w_no_borders"){
columns="right_column_w";	
var border_set="#ffffff";
}
else if($params['layout']=='right_column_n_no_borders'){
columns="right_column_n";	
var border_set="#ffffff";	
}
else if($params['layout']=='no_columns_no_borders'){
columns="no_columns";	
var border_set="#ffffff";	
}
else{
var border_set='#cccccc';	
}

if(columns=="normal_w" || columns=="left_column_w" || columns=="right_column_w"){
if($("#wall_css").length==0){
$(head).prepend('<link id="wall_css" media="screen" rel="stylesheet" href="/master/wall_css.php" type="text/css" />');
}
}
$(head).find("[data-page_exclusive]").remove();
$(head).append(param_style);

var exp=columns.split("_");

if($("[data-lcolumn="+nf_w+"]").length==0){
$("#left_col").remove();
$("#main_divg").before('<div class="'+exp[0]+'_'+nf_w+'_left" id="left_col" data-lcolumn="'+nf_w+'">'+left_column+'</div>');
}

if($("[data-rcolumn="+nf_w+"]").length==0){
$("#right_cl").remove();
$("#main_divg").prepend('<div class="'+exp[0]+'_'+nf_w+'_right" id="right_cl" data-rcolumn="'+nf_w+'">'+right_column+'</div>');
}


if(columns!="no_columns"){
$("#main_divg").attr("class",exp[0]+"_"+nf_w+"_main");
$("#left_col").attr("class",exp[0]+"_"+nf_w+"_left");
$("#right_cl").attr("class",exp[0]+"_"+nf_w+"_right");
}
else{
$("#left_col").remove();	
$("#main_divg").attr("class","nocolumns_main");
$("#left_col").attr("class","nocoulms_left");
}


$("#right_cl").removeClass("sixf");

if(border_set=="#ffffff"){
if(columns=="right_column_n" || columns=="right_column_w" || columns=="no_columns"){
$("#main_divg").addClass("sixfv");
$("#right_cl").addClass("sixf");	
}
}


}
</script>
<?php
include("endf.php");
?>