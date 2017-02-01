<?php

$params['left_column_id']="browse_notes_b";
$params['left_column']='
<script type="text/javascript">
function cda(id){
$(id).fadeOut("slow");	
}
function save_notes_tags(){

$("#ppc_2nt").css("display","block");
$("#pc_2nt").css("display","none");
$("#pc_2ntv").css("display","block");	

var tagsids1=$("#tagsnamesv1").val();

var sbid="'.$sbid.'";	
var id="'.$uidv.'";
		$.ajax({
  type: "POST",
  url: "'.$params['rhelper_js'].'notes/load_note_tags.php?a=d",
  data: {sbid:sbid,id:id,rhelper_js:\''.$params['rhelper_js'].'\',tagsids1:tagsids1},
  success: function(response) {//alert(response);
$("#pc_2ntv").fadeOut("slow");
$("#notes_tagscv").html(response);


}
        }); 


}
</script>
<div id="ppc_2nt" style="width:100%;height:100%;padding:0;margin:0;position:relative;">

<div style="width:700px;height:100%;padding:0;z-index:302;">


<div class="pop_container3" id="pc_2ntv" style="height:auto;display:none;position:fixed;margin-left:200px;width:550px;">
<div class="loading_div_dialog">Loading...</div>
</div>

<div class="pop_container3" id="pc_2nt" style="width:550px;height:auto;display:none;position:fixed;margin-left:200px;">
<div class="div_dialog_header3" id="ddh_2nt">Edit Tags</div>
<div class="div_dialog_body3" id="ddb_2nt" style="height:auto;"></div>
<div class="div_dialog_footer3" style="height:28px;" id="ddf_2nt">
<label class="fsl uiButton uiButtonConfirm mrs" onclick="save_notes_tags();"><input type="button" value="Okay" class="uiButtonText"></label><label class="fsl uiButton" onclick="cda(\'#pc_2nt\'); $(\'ddb_2nt\').html(\'\');"><input type="button" value="Cancel" class="uiButtonText"></label>
</div>
</div>

</div>


</div>
';


$params['left_column'].='<div class="mbm clearfix">
<a style="margin-right:5px;float:left;" href="/'.$uti['username'].'">
<img style="display:block;max-width:180px;" src="/'.$uti['id'].'/pics/'.$uti['profilepic'].'">
</a>
</div>';
if($uidv!=$uid){
$params['left_column'].='
<ul class="uiSideNav" style="list-style-type: none;margin: 0px;padding: 0px;">
<li class="sideNavItem stat_elem">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$uti['username'].'?sk=notes">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
'.$uti['f_name'].'\'s Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_21">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$uti['username'].'?sk=tagged">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
Notes About '.$uti['f_name'].'
</div>
</div>
</a>
</li>
</ul>';
}
$params['left_column'].='
<div class="mvm">
<div role="navigation" class="uiFutureSideNav">
<div>
<div class="uiHeader uiHeaderTopBorder uiHeaderNav">
<div class="clearfix uiHeaderTop">
<div>
<h4 tabindex="0" class="uiHeaderTitle">
Browse Notes</h4>
</div>
</div>
</div>
<ul class="uiSideNav" style="list-style-type: none;margin: 0px;padding: 0px;">
<li class="sideNavItem stat_elem">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/notes/">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
Friends\' Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_21">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/notes/pages/">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
Pages\' Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_22">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$un.'?sk=notes">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
My Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_23">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$un.'?sk=notes_drafts">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
My Drafts
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_24">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$un.'?sk=notes_tagged">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap">
Notes About Me
</div>
</div>
</a>
</li>
</ul>
</div>
</div>
<div class="uiTypeahead mas">
<div class="wrap">
<div class="oinnerWrap" style="height:auto;margin-left:0;border:none;margin-top:0;">
<input class="inputtext textInput dcphc" placeholder="Jump to Friend or Page" aria-autocomplete="list" aria-expanded="false" aria-invalid="false" role="combobox" spellcheck="false" value="Jump to Friend or Page" aria-label="Jump to Friend or Page" type="text" id="jump_note">
</div>
</div>
</div>

</div>

<script type="text/javascript">
			$(function() {
		$( "#jump_note" ).autocomplete({
			minLength: 1,
			autoFocus: true,
			source: function(request, response) {
                $.ajax({
                  url: \''.$params['rhelper_js'].'autocomplete/jump_note.php\',
                  dataType: "json",
                  data: {term:request.term},
                  success: function(data) {
                    response(data);
                  }
                });
            },
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
			var ilusert=ui.item.url;
			window.location="/notes.php?id="+ui.item.uidv;
						return false;					
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {			
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a><img src="\'+item.imgurl+\'" style="width:50px;height:50px;">\' + \'<span style="position:relative;top:-34px;right:-5px;font-weight:bold;">\'+item.value + \'</span></a>\' )
				.appendTo( ul );
		};
	});
</script>
';

$yk=0;
$ykv=0;
$drchatp=array();

$params['left_column'].='<div style="border-top:1px solid #eeeeee;margin-top:8px;padding-top:4px;padding-bottom:4px;text-align:left;">';

$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uidv' ORDER BY datetimep DESC LIMIT 30");
$c=mysql_num_rows($r);

if($c==0){
$dis1='none';
$dis2='block';
$dis3='none';	
}
else{
$dis1='block';
$dis2='none';		
$dis3='block';	
}

$params['left_column'].='

<script type="text/javascript">
function load_note_tags(){
$("#ppc_2nt").css("display","block");
$("#pc_2nt").css("display","none");
$("#pc_2ntv").css("display","block");	
var sbid="'.$sbid.'";	
var id="'.$uidv.'";
		$.ajax({
  type: "POST",
  url: "'.$params['rhelper_js'].'notes/load_note_tags.php",
  data: {sbid:sbid,id:id,rhelper_js:\''.$params['rhelper_js'].'\'},
  success: function(response) {
$("#pc_2ntv").css("display","none");
$("#pc_2nt").css("display","block");
$("#ddb_2nt").html(response);
}
        }); 

}
</script>

<div style="margin-bottom:7px;display:'.$dis1.';" class="clearfix" id="notewtags">
<div style="float:left;margin-left:5px;" class="fcg fwb">Tagged</div>';
if($uid==$uidv){
$params['left_column'].='
<a href="#" onclick="load_note_tags();">
<div style="float:right;margin-right:8px;"><i class="notes_tagged_edit"></i></div>
</a>';
}
$params['left_column'].='
</div>
';	



while($m=mysql_fetch_array($r)){
$mm=$m['tagged'];
$r2=mysql_query("SELECT * FROM registered WHERE id='$mm'");
$c=mysql_num_rows($r2);
if($c>0){
while($m2=mysql_fetch_array($r2)){
	$unvv=$m2['id'];

$drchatp[$yk]='';
	
if($ykv=='0'){$drchatp[$yk]='<div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
if($ykv=='5' || $ykv=='10' || $ykv=='15' || $ykv=='20' || $ykv=='25' || $ykv=='30'){$drchatp[$yk]='</div><div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
$m2fn=str_replace(" ","&nbsp;",$m2['fullname']);
$drchatp[$yk].='<a href="/'.$m2['username'].'"><div style="display:inline-block;padding-right:1px;padding-bottom:1px;"><div style="position:relative;width:32px;padding:0;margin:0;position:relative;"><img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" style="height:32px;width:32px;cursor:pointer;" data-t_text="'.$m2fn.'" data-t_topleft="t"></div></div></a>';


$ykv++;

$yk++;
}
}
else{
	
		$unvv=$m['tagged'];

$drchatp[$yk]='';
	
if($ykv=='0'){$drchatp[$yk]='<div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
if($ykv=='5' || $ykv=='10' || $ykv=='15' || $ykv=='20' || $ykv=='25' || $ykv=='30'){$drchatp[$yk]='</div><div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
$m2fn=str_replace(" ","&nbsp;",$m['tagged']);
$drchatp[$yk].='<div style="display:inline-block;padding-right:1px;padding-bottom:1px;"><div style="position:relative;width:32px;padding:0;margin:0;position:relative;"><img src="/images/notes_tag_placeholder.png" style="height:32px;width:32px;cursor:pointer;" data-t_text="'.$m2fn.'" data-t_topleft="t"></div></div>';

$ykv++;

$yk++;

}

}




$params['left_column'].='

<div id="notes_tagsc" style="display:'.$dis3.';margin:0;padding:0;padding-bottom:2px;">

<div id="notes_tagscv" style="margin:0;padding:0;display:inline-block;text-align:center;">';

$ykvv=$ykv-1;
if(isset($isopened)){$drchatp[$ykvv].='</div>';}
foreach($drchatp as $key => $value){
$params['left_column'].=$value;	
}



$params['left_column'].='

</div>

</div>

</div>
';

if($uid==$uidv){
$params['left_column'].='
<div style="margin-left:7px;" class="lb">
<a href="#" onclick="load_note_tags();" style="display:'.$dis2.';margin-bottom:5px;" id="notewtagsv">Add tags</a>
<a href="/'.$un.'?sk=notes">My Notes</a></div>
';
}
?>