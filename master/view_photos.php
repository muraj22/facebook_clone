<?php
include("start.php");
include("populate_page.php");

if(!isset($_GET['pin'])){
    $_POST['pin_pagination']=1;   
}else{
    $_POST['pin_pagination']=2;   
}
if(!isset($_GET['repin'])){
    $_POST['repin']=1;    
}else{
    $_POST['repin']=2;   
}

if(!isset($_GET['sk']) && !isset($_GET['album'])){$_GET['sk']='photos_tagged';}
else if(!isset($_GET['sk'])){
$_GET['sk']='';
}

include("functions/sb_user.php");
include("functions/simplify_video_duration.php");


$rhelper_js='../';
$rhelper='../';

if(!isset($_GET['pin'])){
    $dtext='Add Photos';
}else{
    $dtext='Add Pins';
}

$addphotosbtn='<div style="display:inline-block;"><div class="addmorep addphotos_caller" style="position:relative;padding-left:19px;padding-top:4px;padding-bottom:4px;"><div style="position:absolute;left:6px;bottom:2px;display:inline;" class="cruz"></div>'.$dtext.'</div></div>';
$addvideobtn='<a href="/video/?upload&oid=100003577943493" style="display:inline-block;color:#333333!important;"><div class="addmorep uiButton" style="position:relative;padding-top:4px;padding-bottom:4px;">Add Video</div></a>';

$echo.='
<script type="text/javascript">
function retw(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],x=w.innerWidth||e.clientWidth||g.clientWidth;
return x;
}
function reth(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
return y;
}
</script>


<script type="text/javascript">
function submitf(w){
document.forms[w].submit();
}
function autoGrowField(f, max) {
	var max = (typeof max == \'undefined\')?1000:max;
	if (f.scrollHeight > max) {
			if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
			return;
	}
	if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
	var scrollH = f.scrollHeight;
	if( scrollH > f.style.height.replace(/[^0-9]/g,\'\') ){
			f.style.height = scrollH+5+\'px\';
	}
}



function autoGrowField2(f, max) {
	var max = (typeof max == \'undefined\')?1000:max;
	if (f.scrollHeight > max) {
			if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
			return;
	}
	if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
	var scrollH = f.scrollHeight;
	if( scrollH > f.style.height.replace(/[^0-9]/g,\'\') ){
			f.style.height = scrollH+5+\'px\';
var maincontainer=$("#pop_container").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,\'\');
var container1=$("#div_dialog_body").css("height");
container1=container1.replace(/[^0-9]/g,\'\');
maincontainer=parseInt(maincontainer)+17+\'px\';
container1=parseInt(container1)+17+\'px\';
$("#pop_container").css("height",maincontainer);
$("#div_dialog_body").css("height",container1);
	}

}
';
$echo.='
</script>';
$params['style']='



<style type="text/css">
body table td{font-size:11px;vertical-align:top;}


.headerphotos{
background-color:rgb(242,242,242);
border-bottom:medium none;
border-top:1px solid rgb(226,226,226);
padding:4px 6px 5px;
margin:0pt 0pt 8px;
word-wrap:break-word;
height:45px;
width:500px;

}
</style>';

$echo.='


<div id="pre_pop_container2o" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv2">

<div class="pop_container3" id="pop_containervvo2" style="height:109px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo2">Delete <span id="delwhat"></span></div>
<div class="div_dialog_body3" id="div_dialog_bodyvo2" style="height:14px;">Are you sure you want to delete this <span id="delwhat2"></span>?


</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervo2"></div></div></div></div>

</div>

<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:560px;height:100%;z-index:302;margin:0 auto;" id="width_msgvv">

</div></div></div>';

$echo.='
<script type="text/javascript">
function photos_stream_pagination(response,org_elem){
if(response!="finished"){
var res=response.split("{}");
var gs=res[1];
var original_gs=res[2];
var cfjax=$(org_elem).attr("fjax");
cfjax=cfjax.replace("gs="+original_gs,"gs="+gs);
//alert(cfjax);
$(org_elem).attr("fjax",cfjax);
$(".photo_wrap:last").after(res[0]); ';
if($_GET['sk']=="photos_albums" || isset($_GET['album'])){
$echo.='
emulate_sort_updatev();
//$(".photo_wrap").removeClass("hidden_sb");
';
}
$echo.='
var daid=$(org_elem).data("s_id");
pagination_finished(daid);
}
}

function photos_older(daid,org_elem){
var kind=$(org_elem).data("s_kind");

$("#photos_stream_pagination").attr("data-s_id",daid);
$("#photos_stream_pagination").click();

}
</script>
';

//phots_tagged and photos_albums [no confundir con photos_stream, stream son todas las fotos de los alumes, photos_albums son solo los albums]

if(!isset($_GET['album']) AND $_GET['sk']!="photos_stream"){


if(!isset($does_not_exist)){

//aca esta la papa

if($_GET['sk']!="photos_albums"){

$params['layout']='normal_w';

$hoverc='ihoverc3';
$hoverc2='ihoverc4';
$picsdisplay='picsdisplay3';
}
else{
$hoverc='ihoverc';
$hoverc2='ihoverc2';
$picsdisplay='picsdisplay';
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$uti=sb_user($uidv);
$name=$uti['f_name']; $uidvname=$uti['fullname'];
if($uidv==$uid){
$echunk='Your Photos'; $name="You";}
else{$echunk=$name.'\' Photos';}

$uti=sb_user($uidv);

$uidva='albums';
$x=0;
$bydate=array();
$theresults=array();

$gs=0;
if($_GET['sk']!="photos_albums"){$gsv=28;}
else{$gsv=18;}



if(($_GET['sk']=='photos_tagged' AND !isset($_GET['album'])) || $_GET['sk']=="photos_albums"){
if(isset($_GET['sk'])){
$_POST['sk']=$_GET['sk'];
}
if(isset($_GET['album'])){
$_POST['album']=$_GET['album'];
}
include("pagination/photos_b.php");
$photos_output=$secho;
}

if($_GET['sk']!="photos_albums" AND !isset($_GET['album'])){}
else{

$uti=sb_user($uidv);

if($uid==$uidv){
	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){$text='Create Album';}
	else{$text='Add Photos';}
	
	if(isset($_GET['album'])){$albumid=$_GET['album'];
	$c=mysql_query(mysql_fetch_array("SELECT COUNT(*) as c FROM media WHERE albumid='$albumid' AND (visibility='v' OR visibility='h')"));
	$c=$c['c'];
	if($c<1000){
	$fr=$addphotosbtn.$addvideobtn;
	}
	else{
		$r=mysql_query("SELECT * FROM albums WHERE sbid='$albumid'");
		while($m=mysql_fetch_array($r)){
		$albumn=$m['albumn'];	
		}
		if($albumn=="Videos"){
		$fr=$addphotosbtn.$addvideobtn;	
		}
		else{
		$fr='';	
		}
	}
	}
	else{
	$fr=$addphotosbtn.$addvideobtn;	
	}
}
else{$fr='';}

if(!isset($_GET['pin'])){
    $dtext='Albums';
}else{
    if($_POST['repin']!=2){
        $dtext='Boards';
    }else{
        $dtext='Repinned Boards';
    }
}

$echo.='
<div class="clearfix" style="margin-top:1px;width:749px;padding-right:20px;">
<div style="float:right;">
'.$fr.'
</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$dtext.'</div></div></div>';
}
if($uid==$uidv){

	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){}
	else{
		$uti=sb_user($uidv);

				$fr=$addphotosbtn.$addvideobtn;

                if(!isset($_GET['pin'])){
                    $dtext='Photos';   
                }else{
                    $dtext='Pins';
                }
                
		$echo.='
		<div class="clearfix" style="margin-top:1px;width:759px;">
<div style="float:right;">
'.$fr.'
</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$dtext.'</div></div></div>';

	}

	$echo.='
<script type="text/javascript">
function winlocc(){

window.location=window.location;
}
var wire_settoport=false;
//var create_photo_album_nf_handler=undefined; 
var global_uidv="'.$uidv.'";
var global_switch=0;
var global_addphotos_button="";
</script>
';

include("addphotos_button.php");
$echo.=$secho;

$echo.='<div id="firsttagen" style="margin:0;padding:0;display:inline-block;">';
$echo.='</div>';
$echo.='<script type="text/javascript">
$("#firsttagen").html("");
</script>';




}
else{
	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){}
	else{
		$uti=sb_user($uidv);
		$echo.='
		<div class="clearfix" style="margin-bottom:7px;margin-top:1px;">
<div style="float:right;">
</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">Photos</div></div></div>';
	}
}

	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){}
	else{
		$r=mysql_query("SELECT * FROM tags as dt WHERE id3='$uidv' AND visibility='v' AND flag!='tw' $tags_qf ORDER BY datetimep DESC LIMIT 1");
		$sc=mysql_num_rows($r);
		if($sc==0){

            if(!isset($_GET['pin'])){
                $dtext='No photos yet';   
            }else{
                $dtext='No pins yet';
            }
            
if($uid==$uidv){
$secho.='<div class="fbStarGridBlankContent">'.$dtext.'. ';

$secho.='<div class="flashUploaderOverlayButton stat_elem" id="u_jsonp_3_a"><a class="fluploader_select" href="#" id="u_jsonp_3_9" rel="async-post" onclick="$(\'.addphotos_caller\').click();">Add photos?</a></div>';

$secho.='</div>';
}else{
    if(!isset($_GET['pin'])){
        $dtext='No photos to show';   
    }else{
        $dtext='No pins to show';
    }
$secho.='<div class="fbStarGridBlankContent">'.$dtext.'</div>';	
}

}
else{
    if(!isset($_GET['pin'])){
          $dtext='Tagged Photos';
    }else{
        $dtext='Tagged Pins';      
    }
$echo.='<div class="uiHeader uiHeaderSection sbPhotosGridHeader fwb" style="margin-top:12px;margin-bottom:2px;width:747px;">'.$dtext.'</div>';
}

}

if($_GET['sk']!="photos_albums" AND !isset($_GET['album'])){
$params['layout']='normal_w';
}
if($_GET['sk']=="photos_albums"){

if($uidv==$uid){$mt='-2';}
else{$mt='11';}

$echo.='<script type="text/javascript">

</script>';
$echo.='<div style="margin:0;padding:0;border-collapse:collapse;position:relative;left:0px;margin:0;width:760px;margin-top:'.$mt.'px;">';
$number3=3; $pdl='12';}

else{
$echo.='<div style="margin:0;padding:0;border-collapse:collapse;position:relative;left:0px;width:760px;margin-left:0px;">';
$number3=4; $pdl='12';}

$echo.=$photos_output;
$echo.='</div>';

if($_GET['sk']=="photos_albums"){
$echo.='<div class="hidden_sb" id="s_load_photos" data-s_emulate="t" data-s_kind="photos_albums" data-s_pagination="t" data-s_elem="html" data-s_percentage="80" data-s_function="photos_older"></div>
<div class="hidden_sb" id="photos_stream_pagination" data-a_custom_f="photos_stream_pagination" fjax="/pagination/photos_b.php?gs='.$gsv.'&gsv=12&uidv='.$uidv.'&sk='.$_GET['sk'].'&pin_pagination='.$_POST['pin_pagination'].'&repin='.$_POST['repin'].'"></div>';
}

if($_GET['sk']=="photos_tagged"){
$echo.='<div class="hidden_sb" id="s_load_photos" data-s_emulate="t" data-s_kind="photos_albums" data-s_pagination="t" data-s_elem="html" data-s_percentage="80" data-s_function="photos_older"></div>
<div class="hidden_sb" id="photos_stream_pagination" data-a_custom_f="photos_stream_pagination" fjax="/pagination/photos_b.php?gs='.$gsv.'&gsv=2&uidv='.$uidv.'&sk='.$_GET['sk'].'&pin_pagination='.$_POST['pin_pagination'].'&repin='.$_POST['repin'].'"></div>';
}


if($uid==$uidv && $_GET['sk']=="photos_albums" && $_POST['repin']!=2){
$echo.='
<div style="display:none;">
<script type="text/javascript">
$(".vid_li").parent().removeClass("move_cl");
$(".vid_li").parent().find(".dragHover").remove();
$(".vid_li").parent().addClass("vid_li");
$(function() {
	$("#sortable1").sortable({
		items: "> li:not(.vid_li)",
		placeholder: \'ui-state-highlightv\',
		update: function(event, ui) {

			imgorder = $("#sortable1").sortable(\'toArray\').toString();
		imgorderl=imgorder.split(",");
		imgorderll=imgorderl.length-1;

		var fajax="";
		x=0;
		var y='.$total_albums.';

		while(x<=imgorderll){
			if(imgorderl[x]==""){}
			else{
			var este=imgorderl[x];

			este=este.replace("li_id","");
var actuale=$("#li_id"+este).attr("data-s_position");
			$("#li_id"+este).attr("data-s_position",y);
			fajax+=y+":"+actuale+"{}";
			y--;
			}

			x++;
		}';

$echo.='var pin='.$_POST['pin_pagination'].';';

$echo.='
				$.ajax({
	async: "false",
	type: "POST",
	url: "/rearrangea.php",
	data: { fajax : fajax,pin:pin},
	success: function(response) {

	}
});

		}, start: function(event,ui){

	},
	stop: function(event,ui){
		emulate_sort_updatev();
	},sort:function(event,ui){

sort_fixv();

	},clone:"clone",tolerance:\'pointer\',appendTo: \'#sortable1\',forcePlaceholderSize: true,cancel: \'.lbs,:input,button\'

	});



});

	function emulate_sort_updatev(){

				$("#sortable1 li.x").removeClass("y");
						$("#sortable1 li.x").removeClass("clear green");


			var multiple=3;
			var ax=0;
			$("#sortable1 li.x").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}

			ax++;
			});

	}

function sort_fixv(){

					$("#sortable1 li").removeClass("clear green");

						$("#sortable1 li.x:not(.ui-sortable-helper)").addClass("y");

						$(".ui-state-highlightv").addClass("y");


			var multiple=3;
			var ax=0;
			$("#sortable1 li.y").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}
			ax++;
			});

}
emulate_sort_updatev();
</script>
</div>
';
}

if($_GET['sk']!="photos_albums"){


//$echo.='</div></div>';

$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
$profilephoto=$m['profilepict'];
}


include("gallery_viewer.php");
$echo.=$secho;


$echo.='
<div style="margin:0;padding:0;" id="apendice">
</div>';
$echo.='<script type="text/javascript">

</script>';

}

}


$uidva='albums';
$x=0;
$bydate=array();
$theresults=array();
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$r = mysql_query("SELECT * FROM albums WHERE id='$uidv' AND visibility='v'");
while($m = mysql_fetch_array($r))
	{
$bydate[$x]=$m['datetimep'];
$theresults[$x]=$m['albumn'].'{}'.$m['sbid'];
$x++;
}

mysql_close($con);
}
else{
if(isset($_POST['selected_album']) || isset($_GET['album']) || $_GET['sk']=="photos_stream"){
if(isset($_GET['album'])){
$_POST['album']=$_GET['album'];
}
if(isset($_GET['sk'])){
$_POST['sk']=$_GET['sk'];
}
$gs=0;
$gsv=28;
include("pagination/photos.php");
$photos_output=$secho;
}

if(isset($_POST['selected_album']) || isset($_GET['album']) || $_GET['sk']=="photos_stream"){
$r = mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m = mysql_fetch_array($r))
	{
$fullname=$m['fullname'];
}

arsort($bydate);

if($_GET['sk']!="photos_stream"){
$uidva='albums';
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$selected_album' AND id='$uidv' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$thediff=$m['datetimep'];
}
}
$extraalbumchunk='';
if($uid==$uidv){
	if(isset($_GET['album'])){$varc=$_GET['album'];}else{$varc='';}
	if($albumn=="Profile Pictures" OR $albumn=="Wall Photos"){
	$extraalbumchunk='';
	}else{$pfp="media";
	if(isset($_GET['album'])){$albumid=$_GET['album'];
	$con=mysql_connect("localhost","root","xd22xd22");
	mysql_select_db("registered");
	$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE albumid='$albumid' AND (visibility='v' OR visibility='h')"));
	$c=$c['c'];
	if($c<1000){
	$extraalbumchunk=$addphotosbtn;
	}
	else{
		$r=mysql_query("SELECT * FROM albums WHERE sbid='$albumid'");
		while($m=mysql_fetch_array($r)){
		$albumn=$m['albumn'];	
		}
		if($albumn=="Videos"){
		$extraalbumchunk=$addphotosbtn.$addvideobtn;	
		}
		else{
		$extraalbumchunk='';	
		}
	}
	
	}else{
	$extraalbumchunk=$addphotosbtn.$addvideobtn;
	}
	
	}



if($_GET['sk']=="photos_stream"){

	if($uid==$uidv){$albumn="Photos of You";}

	}
}
else{$albumn="Photos of $fullname";}



$uti=sb_user($uidv);

if(!isset($_GET['album'])){

		$echo.='
<script type="text/javascript">
function winlocc(){

window.location=window.location;
}
//var create_photo_album_nf_handler=undefined;
var global_uidv="'.$uidv.'";
var global_switch=0;
var global_addphotos_button="";
</script>
';

include("addphotos_button.php");
$echo.=$secho;


$echo.='
<div id="firsttagen" style="margin:0;padding:0;display:inline-block;">';
$echo.='</div>';
$echo.='<script type="text/javascript">
$("#firsttagen").html("");
</script>';


$echo.='

<script type="text/javascript">
function windowloc(el){
	window.location=el;
}
</script>



';

if($_GET['sk']=="photos_stream" AND $uid==$uidv){
$extraalbumchunk=$addphotosbtn.$addvideobtn;
}

if(!isset($_GET['pin'])){
    $dtext='Album Photos';
    $dtextv='Photos from Albums';   
}else{
    if($_POST['repin']==1){
        $dtext='Board Pins';
        $dtextv='Pins from Boards';
    }else{
        $dtext='Board Repins';
        $dtextv='Repins from Boards';     
    }
}

if(!isset($_GET['pin'])){
$r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Photos' $media_qf AND pin='1' ORDER BY datetimep DESC LIMIT 1");
}else{
$r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Pins' $media_qf AND pin='2' ORDER BY datetimep DESC LIMIT 1");
}
$sc=mysql_num_rows($r);
$echo.='
<div class="clearfix" style="margin-top:-13px;width:759px;padding-right:0px;">
<div style="float:right;" class="clearfix">'.$extraalbumchunk.'</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$dtext.'</div></div></div>';

if($sc==0){}
else{	
$echo.='<div class="uiHeader uiHeaderSection sbPhotosGridHeader fwb" style="margin-top:12px;margin-bottom:0px;width:747px;">'.$dtextv.'</div>';
}
}
if(isset($_GET['album'])){

$params['layout']='right_column_w_no_borders';

$ralbum=$_GET['album'];
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$ralbum' AND id='$uidv' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$ralbumv=$m['albumn'];
$location=$m['location'];

$ms=$m;

$descv=$ms['descr']; //textarea

if(strpos($descv,"<b data-uidv")!==false){
    $html=$descv;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->setAttribute("data-uidv","");
        $node->nodeValue = $utivv['fullname'];
    }
    $descv="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $descv.=$dom->saveHTML($node);
    }

}

$desc=$ms['descr']; //display

if(strpos($desc,"<b data-uidv")!==false){
    $html=$desc;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->removeAttribute("data-uidv");
        $node->nodeValue = '';
        $newNode = $dom->createElement('div', '');
        $newNode->setAttribute('style','display:inline-block;');
        $oldNode = $node;

        $oldNode->parentNode->replaceChild($newNode, $oldNode);
        $div = $dom->createElement('div','&nbsp;');
        $div->setAttribute('class', 'lb');
        
        $anchor = $dom->createElement('a',$utivv['fullname']);
        $anchor->setAttribute('href', '/'.$utivv['username']);
        $anchor->setAttribute('hc', '');
        
        $div->appendChild($anchor);
        
        $newNode->appendChild($div);
        
    }
    $desc="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $desc.=$dom->saveHTML($node);
    }

}

$desc=str_replace("&nbsp;","",$desc);

$descvv=$ms['descr']; //highlighter

if(strpos($descvv,"<b data-uidv")!==false){
    $html=$descvv;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->nodeValue = $utivv['fullname'];
    }
    $descvv="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $descvv.=$dom->saveHTML($node);
    }

}

}



if($_GET['sk']!="photos_stream"){
if($uidv==$uid){
if($location!=""){
$taken=' <span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span> Taken at '.$location;
}
else{$taken='';}
}
else{
if($location!=""){
$taken=' <span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span> Taken at '.$location;
}
else{$taken='';}
}


function oturndate_photos($date){$date=tod($date);
	return date('l, F j, Y \a\t g:ia', strtotime($date));
}

function turndate_photos($date){$date=tod($date);
	return date('F j \a\t g:ia', strtotime($date));
}

function turndate3_photos($date){$date=tod($date);
	return date('g:ia', strtotime($date));
}

function td_photos($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf=" month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
if(substr($td,0,1)=="0"){$td=substr($td,1);}

if($td>1){$suf.='s';}

if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td=2;}
	if($suf==' days' && $td>1){$td=turndate_photos($topv); return $td;}

$td=$td.$suf.' ago';

	if($td=='1 day ago'){$hrsminsec=turndate3_photos($topv); $td='Yesterday at '.$hrsminsec;}
	return $td;
}

function format_date($t,$w){
return date($w,strtotime($t));
}

function polish_d($difff){
$difff=str_replace("-","",$difff);
$difff=str_replace("+","",$difff);
if($difff=="00"){$difff="0";}
if(strlen($difff)>1 AND substr($difff,0,1)=="0"){
$difff=substr($difff,1);
}
return $difff;
}

function timestamp_update_albums($time){

$time=tod($time);
$otime=$time;
$time=new DateTime($time);
$ttime=new DateTime();

$diff=$ttime->diff($time);

$difff=$diff->format("%R%Y"); $el="year";
if($difff=="+00" || $difff=="-00"){$difff=$diff->format("%R%m"); $el="month";}
if($difff=="+0" || $difff=="-0"){$difff=$diff->format("%R%d"); $el="day";}
if($difff=="+0" || $difff=="-0"){$difff=$diff->format("%R%H"); $el="hour";}
if($difff=="+00" || $difff=="-00"){$difff=$diff->format("%R%i"); $el="minute";}
if($difff=="+0" || $difff=="-0"){$difff=$diff->format("%R%s"); $el="second";}
if($difff=="+0" || $difff=="-0"){$difff="1";}
$difff=str_replace("-","",$difff);
$difff=str_replace("+","",$difff);

if(substr($difff,0,1)=="0"){
$difff=substr($difff,1);
}

$el_v=array();

$el_v['y']=$diff->format("%R%Y");
$el_v['m']=$diff->format("%R%m");
$el_v['d']=$diff->format("%R%d");
$el_v['h']=$diff->format("%R%H");
$el_v['i']=$diff->format("%R%i");
$el_v['s']=$diff->format("%R%s");

foreach($el_v as $k=>$v){
$v=polish_d($v);
$el_v[$k]=$v;
}

if($el_v['y']>0){
return 'Updated over a year ago';
}
else if($el_v['m']>=1){

if($el_v['d']>=15){
$so=$el_v['m']+1;
return 'Updated about '.$so.' months ago';
}
else{
$so=$el_v['m'];
if($so>1){$sp='s';}
else{$so='a'; $sp='';}
return 'Updated about '.$so.' month'.$sp.' ago';
}


}
else if($el_v['d']>=1){
if($el_v['d']>=21 AND $el_v['d']<=31){
return 'Updated about 3 weeks ago';
}
else if($el_v['d']>=14 AND $el_v['d']<21){
return 'Updated about 2 weeks ago';
}
else if($el_v['d']>=7 AND $el_v['d']<14){
return 'Updated about a week ago';
}
else if($el_v['d']>1 AND $el_v['d']<7){
return 'Updated on '.format_date($otime,"l");
}
else{return 'Updated Yesterday';}
}
else{
if($difff>1){$sp='s';}
else{$sp='';}
if($el=="hour" AND $difff==1){$difff="about an";}
return 'Updated '.$difff.' '.$el.$sp.' ago';
}



}





$mgtp='margin-top:9px;';}
else{$mgtp='margin-top:7px;';}

$uti=sb_user($uidv);

if($ralbumv=="Videos" OR $ralbumv=="Photos"){ //photos is just photos posted to other's walls
$ralbumv=$uti['fullname'].'\'s '.$ralbumv;
$extraalbumchunk='';
$taken='';
}
else{

if($uid==$uidv && $ralbumv!="Profile Pictures" && $albumn!='Photos'){
$extraalbumchunk.='<a href="/media_set_edit.php?a='.$_GET['album'].'" class="uiButton mls" style="position:relative;"><i class="mrs img lapiz_i"></i><span class="uiButtonText">Edit</span></a>';
}

}



$echo.='
<div class="clearfix" style="margin-top:-14px;width:949px;padding-right:20px;">
<div style="float:right;">'.$extraalbumchunk.'</div>
<div class="hphotoswrapper" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:16px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$ralbumv.'</div></div></div>';

$echo.='
<script type="text/javascript">
function winlocc(){

window.location=window.location;
}
//var create_photo_album_nf_handler=undefined; 
var global_uidv="'.$uidv.'";
var global_switch=0;
var global_addphotos_button="?album='.$_GET['album'].'";
</script>
';


include("addphotos_button.php");
$echo.=$secho;


$echo.='<div class="clearfix" style="margin-top:2px;">';

if(!isset($_GET['pin'])){
    $dtext='Albums';
    $dhref='photos_albums';
}else{
    $dtext='Boards';
    $dhref='pins_boards';
}

if($albumn!='Photos' AND $albumn!='Pins'){
$echo.='
<div style="float:left;"><div class="lb" style="display:inline-block;"><span class="fcg">By</span> <a href="/'.$uidv.'/">'.$fullname.'</a> <span class="fcg">(</span><a href="'.$dhref.'">'.$dtext.'</a><span class="fcg">)</span></div>';
}

if($albumn!='Videos' AND $albumn!='Photos' AND $albumn!='Pins'){
$echo.='<span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span> <span class="fcg" title="'.oturndate_photos($thediff).'">'.timestamp_update_albums($thediff).'</span></span>'.$taken;
}

if($uidv==$uid AND $albumn!='Profile Pictures' AND $albumn!='Videos'){
//$echo.='<a href="/media_set_edit.php?a='.$ralbum.'"><div style="position:relative;margin:0;padding:0;display:inline-block;"><div class="pensp" style="position:relative;top:-1px;left:-1px;margin-right:4px;"></div></div>Edit Album</a>';
}


$uidv=$uidv;

$albumn=$albumn;

$ltypev="albums";
$uid_album_edit="t";
$peditablev="t";

$sbid=$_GET['album'];
$albumid=$sbid;

$nfjax="";
$data_t='data-t_align="center"';


if($albumn=="Profile Pictures" || $albumn=="Wall Photos"){
$watchmode="t"; //proper from this type of album view
$data_t='data-t_topleft="t"';
$dclass=" saudienceSelector";
}
else{
$dclass="";
}


if($albumn!="Videos" AND $albumn!='Photos'){
$echo.='<ul class="uiList inlineBlock audienceSelectorv '.$dclass.'" style="position:relative;top:-2px;margin-left:1px;">';


$privacy_configuration="small";
$privacy_source="av";  //album view

$album_edit="t";

include("buttons/privacy_button.php");

$echo.=$button;
$echo.='</ul>';
}

unset($watchmode);
unset($album_edit);


$echo.='</div></div>



<div id="firsttagen" style="margin:0;padding:0;display:inline-block;">';
$echo.='</div>';
$echo.='<script type="text/javascript">
$("#firsttagen").html("");
</script>';
}
// other $nphotos: else{$nphotos="bla bla bla";}

if(!isset($mgtp)){$mgtp='margin-top:9px;';}

if(!isset($_GET['album'])){
$mglf='margin-left:1px;';
}
else{
$mglf='';
}
$echo.='
<div style="margin:0;'.$mglf.'padding:0;border-collapse:collapse;width:780px;position:relative;left:0px;'.$mgtp.'">';
$echo.=$photos_output;
$echo.='</div>';

if($_GET['sk']=="photos_stream"){
$echo.='<div class="hidden_sb" id="s_load_photos" data-s_emulate="t" data-s_kind="photos_stream" data-s_pagination="t" data-s_elem="html" data-s_percentage="80" data-s_function="photos_older"></div>
<div class="hidden_sb" id="photos_stream_pagination" data-a_custom_f="photos_stream_pagination" fjax="/pagination/photos.php?gs='.$gsv.'&gsv=32&uidv='.$uidv.'&sk='.$_GET['sk'].'&pin_pagination='.$_POST['pin_pagination'].'&repin='.$_POST['repin'].'"></div>';
}

if(isset($_GET['album'])){
$echo.='<div class="hidden_sb" id="s_load_photos" data-s_emulate="t" data-s_kind="photos_album" data-s_pagination="t" data-s_elem="html" data-s_percentage="100" data-s_function="photos_older"></div>
<div class="hidden_sb" id="photos_stream_pagination" data-a_custom_f="photos_stream_pagination" fjax="/pagination/photos.php?gs='.$gsv.'&gsv=32&uidv='.$uidv.'&sk='.$_GET['sk'].'&album='.$_GET['album'].'&pin_pagination='.$_POST['pin_pagination'].'&repin='.$_POST['repin'].'"></div>';
}


if(isset($_GET['album'])){



$u_friends=array();
$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($m=mysql_fetch_array($r)){
$u_friends[]=$m['id2'];
}

if($uid==$uidv){

$echo.='
<script type="text/javascript">
$(function() {
	$("#sortable2").sortable({
//	  handle:".picsdisplay4",
		items: "> li:not(.vid_li)",
		placeholder: \'ui-state-highlightvv\',
		update: function(event, ui) {

			imgorder = $("#sortable2").sortable(\'toArray\').toString();
		imgorderl=imgorder.split(",");
		imgorderll=imgorderl.length-1;

		var fajax="";
		x=0;
		var y=0;

		while(x<=imgorderll){
			if(imgorderl[x]==""){}
			else{
			var este=imgorderl[x];
			y=y+1;
			este=este.replace("li_id","");
var actuale=$("#li_id"+este).attr("data-s_position");
			$("#li_id"+este).attr("data-s_position",y);
			fajax+=y+":"+actuale+"{}";

			}

			x++;
		}
		//alert(fajax);

				$.ajax({
	async: "false",
	type: "POST",
	url: "/rearrangep.php",
	data: { fajax : fajax,selected_album:"'.$_GET['album'].'" },
	success: function(response) {//alert(response);

	}
});

		}, start: function(event,ui){

	},
	stop: function(event,ui){
		emulate_sort_updatev();
	},sort:function(event,ui){

sort_fixv();

	},clone:"clone",tolerance:\'pointer\',appendTo: \'#sortable2\',forcePlaceholderSize: true,cancel: \'.lbs,:input,button\'

	});



});

	function emulate_sort_updatev(){

				$("#sortable2 li.x").removeClass("y");
						$("#sortable2 li.x").removeClass("clear green");


			var multiple=4;
			var ax=0;
			$("#sortable2 li.x").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}

			ax++;
			});

	}

function sort_fixv(){

					$("#sortable2 li").removeClass("clear green");

						$("#sortable2 li.x:not(.ui-sortable-helper)").addClass("y");

						$(".ui-state-highlightvv").addClass("y");


			var multiple=4;
			var ax=0;
			$("#sortable2 li.y").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}
			ax++;
			});

}
emulate_sort_updatev();
</script>';

}




	if($albumn!='Videos' AND $albumn!='Photos'){
$echo.='

<script type="text/javascript">
function showotherp(w,wv){
if(wv==undefined){wv="v"+w; var mor="";}
else{var mor="vv";}
var concrete=$("#otherpeoplev"+mor+w).html();
concrete=\'<div class="pop_container" id="fpop_containerv\'+mor+w+\'" style="height:441px;display:none;position:fixed;"><div class="div_dialog_header" id="fdiv_dialog_header\'+mor+w+\'">Friends</div><div class="div_dialog_body" id="fdiv_dialog_bodyv\'+mor+w+\'" style="height:350px;padding-top:3px;overflow-y:auto;overflow-x:hidden;">\'+concrete+\'</div><div class="div_dialog_footer" style="height:25px;" id="div_dialog_footerv\'+mor+w+\'"><input type="button" value="Close" onclick="close_msgvv(\\\'\'+mor+w+\'\\\');" class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:28px;" id="close_msgvv\'+mor+w+\'"></div></div>\';

var spoph=$("#fpop_containerv"+mor+w).css("height");

if(spoph===undefined){
	$("#width_msgvv").append(concrete);
}

if(mor==""){$("#fdiv_dialog_header"+w).html("People Who Like This");}
else{$("#fdiv_dialog_header"+w).html("Friends");}

var checkjs=$("#checkjs"+wv);
if(checkjs){}
else{$("#close_msgvv"+mor+w).css("top","415px"); $("#close_msgvv"+mor+w).css("right","28px");}

$("#fpop_containerv"+mor+w).css("display","block");
}
function close_msgvv(w){
$("#fpop_containerv"+w).fadeOut("slow");
$.doTimeout( 1600, function(){
$("#fpop_containerv"+w).remove();
});
}
</script>
<script type="text/javascript">
function checkwacv(){
var tocheck=$("#comment2").val();
if(tocheck=="Write a comment..."){$("#comment2").val(""); $("#comment2").css("color","#333333");}
}
function checkwac2v(){
var tocheck=$("#comment2").val();
if(tocheck==""){$("#comment2").css("color","#666666"); $("#comment2").val("Write a comment...");}
}

var saved_descvv=false;
var saved_descv=false;
function savedesc(){
var dval=$("#desc_changev").val();
dval=$.trim(dval);
if(dval=="Add a description"){dval="";}
if(dval!=""){
dval=$("#desc_changev").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html();
}
var selected_album="'.$_GET['album'].'";
$.ajax({
	type: "POST",
	url: "../changealbumdesc.php",
	data: { album_desc : dval, selected_album : selected_album }}).done(function(response){
    
    });

$("#apdesc_change").html(dval);

saved_descvv=dval;
saved_descv=$("#desc_changev").val();
$("#desc_change").css("display","none");
if(dval==""){
$("#pdesc_changev").css("display","block");
$("#pdesc_change").css("display","none");
}else{
$("#pdesc_change").css("display","block");
$("#pdesc_changev").css("display","none");
}

}
function showtexta(){
$("#pdesc_changev").css("display","none");
$("#pdesc_change").css("display","none");
$("#desc_change").css("display","block");
}
function canceldesc(){
var desc=$("#apdesc_change").html();
desc=$.trim(desc);
$("#desc_change").css("display","none");
if(desc==""){$("#pdesc_changev").css("display","block");
$("#pdesc_change").css("display","none");
}
else{
		$("#pdesc_change").css("display","block");
$("#pdesc_changev").css("display","none");
}
$("#desc_changev").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html(saved_descvv);
$("#desc_changev").val(saved_descv);
}
function autogr(f, max) {
	if (f.scrollHeight > max) {
			if (f.style.overflowY != "scroll") { f.style.overflowY = "scroll" }
			return;
	}
	if (f.style.overflowY != "hidden") { f.style.overflowY = "hidden" }
	var scrollH = f.scrollHeight;
	if( scrollH > f.style.height.replace(/[^0-9]/g,"") ){
			f.style.height = scrollH+5+"px";
	}

}
</script>';
if(isset($setpf)){
if($desc==''){$cmn='block'; $cmn2='none';}else{$cmn='none'; $cmn2='block';}

if($uidv==$uid AND $albumn!='Profile Pictures'){
$echo.='
<div style="margin:0;padding:0;display:block;margin-bottom:4px;display:'.$cmn.';" id="pdesc_changev">
<div class="pensp" style="position:relative;top:0px;left:-1px;margin-right:3px;"></div><span class="friendslink4ov" onclick="showtexta();">Add a description</span>
</div>';
}




if($ralbumv!="Videos"){

$echo.='
<div id="pdesc_change" style="margin:0;padding:0;margin-bottom:4px;display:'.$cmn2.';width:430px;">';

if($uid==$uidv){$echo.='<div class="spen hidden_sb" id="edit_description" title="Edit this description" onclick="showtexta();"></div>';}
$echo.='
<div id="apdesc_change" style="margin:0;padding;0;display:inline-block" class="hidden_sb">
'.$desc.'
</div>
</div>
<div id="desc_change" style="width:430px;display:none;">

<div style="position:relative;min-height:21px;">
<div class="highlighter_wrapper" style="position:relative;"><div class="highlighter" style="padding:0;position:absolute;width:306px;overflow-y:hidden;max-height:480px;padding-top:2px;"><div style="width:auto;min-height:21px;"><span class="highlighterContent" style="max-width:100%;vertical-align:top;display:inline-block;position:relative;top:4px;color:transparent;font-size:11px!important;padding:0 4px;line-height:14px!important;"></span><div class="highlighterAuxContent" style="vertical-align:top;display:inline-block;position:relative;"><div class="metadataFragment"></div></div></div></div><div style="background: none repeat scroll 0% 0% transparent;height:auto;border:0px none;" class="uiTypeahead composerTypeahead mentionsTypeahead"><div style="padding:0px;border:0px none;" class="step_autocomplete"><div style="overflow:hidden;cursor:default;"><textarea style="min-height:40px!important;max-height:480px;padding:5px;height:36px;min-height:36px;width:419px;font-size:11px;margin:0pt 0pt 2px;overflow:hidden;resize:none;color:rgb(119,119,119);border:1px solid rgb(189,199,216);font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;word-wrap:break-word;margin-bottom:4px;line-height:13px!important;" class="uiTextareaAutogrow input mentionsTextarea textInput says2 dcphmgc to_highlighter" data-au_grow="" data-au_nopadding="t" title="Add a description" placeholder="Add a description" autocomplete="off" id="desc_changev" data-au_grow=""></textarea></div></div><div><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="autocomplete_findme inputtext dcphmgc displaynoneimportant hidden_sb" data-ac_enable="wall_uploaderdv30001" data-ac_liwidth="417" data-ac_inputw="280" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_custom_f="add_to_highlighter" data-ac_placeholder="Who where you with?" data-ac_position="fixed" data-ac_custom_ul=\'$(this).css("margin-left","-1px"); $(this).css("margin-top","-17px");\'></div><input type="hidden" name="descriptionv" autocomplete="off"></div></div></div>
</div>

<script type="text/javascript">
var descvv=$("#apdesc_change").html();
descvv=str_replace("<p>","",descvv);
descvv=str_replace("</p>","",descvv);
$("#apdesc_change").html(descvv);
$("#apdesc_change").removeClass("hidden_sb");

$(document).ready(function(){
$("#desc_changev").bind("keyup",to_highlighter_keyup);
$("#desc_changev").bind("scroll",keep_scroll_to_highlighter);
$("#desc_changev").bind("keyup",keep_scroll_to_highlighter);
$("#desc_changev").trigger("keydown");
$("#desc_changev").trigger("keyup");

var ddesc=\''.$descv.'\';
ddesc=str_replace("<p>","",ddesc);
ddesc=str_replace("</p>","",ddesc);
ddesc=str_replace(\'<b data-uidv="">\',\'\',ddesc);
ddesc=str_replace("</b>","",ddesc);
ddesc=str_replace("<br>","\n",ddesc);
saved_descv=ddesc;
$("#desc_changev").val(ddesc);

var ddescv=\''.$descvv.'\';
ddescv=str_replace("<p>","",ddescv);
ddescv=str_replace("</p>","",ddescv);
saved_descvv=ddescv;
$("#desc_changev").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html(ddescv);

$("#desc_changev").trigger("keydown");
$("#desc_changev").trigger("keyup");

$("#edit_description").removeClass("hidden_sb");
});
</script>

<div style="margin:0;padding:0;display:block;height:24px;margin-top:40px;">
<div style="margin:0;padding:0;float:right;position:relative;left:-1px;">
<label class="saveec" onclick="savedesc();"><input type="button" value="Save" class="saveec2"></label>
<label class="cancelec" style="margin-left:0px;" onclick="canceldesc();"><input type="button" value="Cancel" class="cancelec2"></label>
</div>
</div>
</div>



';

$value=$uidv;

$dr=array();
$x=0;
$dr[$x]="";
$xrtl=0; //propietario de comentarios para esta story
$xrt=0; //propietario de comentarios globales para news feed

$ltype="album";
$likeid=$_GET['album'];
$whati="album";
$alborp="a";
$pid=$likeid;
$vidl="";
$vidt="";
$vidd="";


$echo.='
<table data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" style="border-collapse:separate;padding:0;margin:0;background:#ffffff;position:relative;width:420px;margin-top:9px" cellspacing="0" cellpadding="0" id="mgt"><tr><td style="text-align:left;"><table style="padding:0;margin:0;border-collapse:collapse;" cellspacing="0" cellpadding="0" id="appendlikealbum"><tr><td style="text-align:left;">';



$alb=$_GET['album'];
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$uo=$uidv;
$key3v="";

$albumidv[$key3v]=$_GET['album'];


$aresult=mysql_query("SELECT COUNT(*) AS acount FROM media WHERE id='$uo' AND albumid='$albumidv[$key3v]' AND visibility='v' and nye='3' $media_qf");
$xg=mysql_num_rows($aresult);
			
$uti=sb_user($uid);

$uo_un=$uti["username"];
$uo_fn=$uti["fullname"];
$uo_pic=$uti["profilepict"];


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}

if($_POST['pin_pagination']==1){
    $repin='';
}else{
    $r10 = mysql_query("SELECT * FROM repinw WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND repins='1'");
    $nb=mysql_num_rows($r10);
    if($nb>0){
        $repin='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a href="#" class="unpin" title="Unpin this item">Unpin</a></div><div style="margin:0;padding:0;display:none;" class="lbl"><a href="#" class="repin" title="Repin this item">Repin</a></div>&nbsp;&#183;&nbsp;';	
    }
    else{
        $repin='<div style="margin:0;padding:0;display:none;" class="lbl"><a href="#" class="unpin" title="Unpin this item">Unpin</a></div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a href="#" class="repin" title="Repin this item">Repin</a></div>&nbsp;&#183;&nbsp;';	
    }
}


$pid="";
$sharef='show_msg_dialogs(\''.$albumidv[$key3v].'\',\'shared_album\',\''.$uo.'\',\''.$pid.'\','.$xg.','.$x.',\''.$vidl.'\',\''.$vidt.'\',\''.$vidd.'\')';

	$dr[$x].='<table style="margin:0;padding:0;"><tr><td class="story_foot_tdv" style="padding-left:4px;"><div class="lbl" style="margin:0;padding:0;display:inline-block;">'.$like.$repin.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>&nbsp;</div></td></tr></table>';



$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;
	
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$whati'");
while($m10 = mysql_fetch_array($r10))
{


    $count=$m10['count'];
    if($count!='0'){$count=$count;}else{unset($count);}


}

$r10 = mysql_query("SELECT * FROM repins WHERE likeid='$likeid' AND what='$whati'");
while($m10 = mysql_fetch_array($r10))
{


    $countv=$m10['count'];
    if($countv!='0'){$countv=$countv;}else{unset($countv);}


}



	$vrt=0;
$uidvp=$uo.'pc';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM comments WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];
  


	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
 
if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$uo;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");
    
if(isset($countv)){
$totrepins=$countv;
}
else{$totrepins=0;}
 
if(isset($countv)){

$ltype=$ltype;
$wp_table='repin';
$likeid=$likeid;
$owner_c=$uo;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/repinned_this.php");


if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\';';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}


if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}


if($alborp=='p' || $alborp=='v'){
    $share_id=$likeid;
    if($alborp=="p"){
$dshare="shared_photo";
}
else{
$dshare="shared_video";	
}
$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$likeid' AND whatisit='$dshare' AND visibility='v'"));
$counter=$counter['counter'];
}
else{
    $dshare='shared_album';
    $share_id=$albumid;
$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$albumid' AND whatisit='shared_album' AND visibility='v'"));
$counter=$counter['counter'];
}

if($counter>0){
if($counter>1){$isp='s';}
else{$isp='';}

$ltype='';
$wp_table='shares';
$owner_c=$uo;

include("stories/with_plugin.php");

$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:78px;padding-top:6px;display:'.$tmv.';" class="foot_box_inner" id="share_c'.$x.'">



<div class="share_bt" style="position:absolute;left:5px;bottom:3px;"></div>

<div class="friendslinkvl" style="display:inline-block;position:relative;left:23px;bottom:1px;">'.$with.'</div>

</div>';
$hasshares='';
}

$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top+1; $top=$top*10;}

$topa[$x]=$top;

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:6px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:24px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove();  $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\');" id="moremsg'.$x.'">View all '.$vrt.' comments</span>';

$dr[$x].='<span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2);" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#808080;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div>

</div>';

$dr[$x].='</div>';	
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='t';

$value=$uo;

$thefabtext=$likeid;

include("load_2_comments.php");

include("comment_box.php");

$dr[$x].='</div>'; //foot box closure



$echo.=$dr[$x];


$echo.='
</td></tr></table></td></tr></table>
';


$uti=sb_user($uidv);
$profilephoto=$uti['profilepict'];


}
}

}

}


include("functions/sb_user.php");

$uti=sb_user($uidv);
$profilephoto=$uti['profilepict'];




include("gallery_viewer.php");
$echo.=$secho;


$echo.='
<div style="margin:0;padding:0;" id="apendice"></div>';


}

mysql_close($con);
}


if($_GET['sk']!="photos_albums"){
$echo.='</div></div>';
}
?>
<?php

$params['rhelper']='../';
$params['rhelper_js']='../';
$params['title']='Upfrev';

if(!isset($params['layout'])){
$params['layout']='normal_w';
}


$uti=sb_user($uidv);


$uidvp="media";

//!=Photos for photos posted to walls
if(!isset($_GET['pin'])){
    $r=mysql_query("SELECT * FROM $uidvp WHERE id='$uidv' AND visibility='v' AND nye='3' AND albumn!='Photos' AND pin='1'");
    $ap=mysql_num_rows($r);
}else{
    $r=mysql_query("SELECT * FROM $uidvp WHERE id='$uidv' AND visibility='v' AND nye='3' AND albumn!='Pins' AND pin='2'");
    $ap=mysql_num_rows($r);
}
if($ap!=0){$ap=' <span class="fcg">('.$ap.')</span>';}
else{$ap='';}

$apv=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM repinw as dt WHERE id2='$uidv' AND repins='1' AND what='photo' AND (SELECT COUNT(*) as cv FROM media WHERE id=dt.id AND visibility='v' AND nye='3' AND albumn!='Pins' AND pin='2')>0"));
$apv=$apv['c'];
if($apv>0){
 $apv=' <span class="fcg">('.$apv.')</span>';
}else{
    $apv='';    
}

$uidva='albums';
if(!isset($_GET['pin'])){
    $r=mysql_query("SELECT * FROM $uidva WHERE id='$uidv' AND visibility='v' AND albumn!='Photos' AND pinboard='1'");
    $a=mysql_num_rows($r);
}else{
    $r=mysql_query("SELECT * FROM $uidva WHERE id='$uidv' AND visibility='v' AND albumn!='Pins' AND pinboard='2'");
    $a=mysql_num_rows($r);
}
if($a!=0){$a=' <span class="fcg">('.$a.')</span>';}
else{$a='';}

$av=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM repinw as dt WHERE id2='$uidv' AND repins='1' AND what='album' AND (SELECT COUNT(*) as cv FROM albums WHERE sbid=dt.likeid AND visibility='v' AND albumn!='Pins')>0"));
$av=$av['c'];
if($av!=0){$av=' <span class="fcg">('.$av.')</span>';}
else{$av='';}

if(!isset($_GET['pin'])){
$params['left_link_w']="photos";
}else{
$params['left_link_w']="pins";
}

if(isset($_GET['pin'])){
    $params['left_menu_added']='
<script type="text/javascript" data-lma="">
$("#llm11").parent().eq(0).after(\'<div data-lma="">';


    if($ap=='' && $uid!=$uidv){}
    else{
        $params['left_menu_added'].='<a href="/'.$uti['username'].'/pins_stream"><div id="llmap" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmapv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Board Pins'.$ap.'</div></div></a>';
    }

    $params['left_menu_added'].='<a href="/'.$uti['username'].'/pins_boards"><div id="llma" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmav" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Boards'.$a.'</div></div></a>';
    
    if($apv=='' && $uid!=$uidv){
    }else{
        $params['left_menu_added'].='<a href="/'.$uti['username'].'/repins_stream"><div id="llmaop" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmaopv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Repins'.$apv.'</div></div></a>';
    }   
      $params['left_menu_added'].='<a href="/'.$uti['username'].'/repins_boards"><div id="llmao" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmaov" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Repinned Boards'.$av.'</div></div></a></div>\');

      </script>
';
}else{
    $params['left_menu_added']='
<script type="text/javascript" data-lma="">
$("#llm4").parent().eq(0).after(\'<div data-lma="">';


    if($ap=='' && $uid!=$uidv){}
    else{
        $params['left_menu_added'].='<a href="/'.$uti['username'].'/photos_stream"><div id="llmap" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmapv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Album Photos'.$ap.'</div></div></a>';
    }

    $params['left_menu_added'].='<a href="/'.$uti['username'].'/photos_albums"><div id="llma" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmav" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Albums'.$a.'</div></div></a></div>\');
</script>
';
}

if(!isset($_GET['pin'])){
    $w=4;
}else{
    $w=11;
}
if($_GET['sk']=="photos_albums"){
$params['left_menu_added'].='
<script type="text/javascript">
$("#llm'.$w.'").removeClass("wrapper_fotos2");
$("#llm'.$w.'").addClass("wrapper_fotos");
$("#llm'.$w.'v").removeClass("linkwrap2");
$("#llm'.$w.'v").addClass("linkwrap");';

if($_POST['repin']==2){
    $params['left_menu_added'].='
$("#llmao").removeClass("wrapper_fotos");
$("#llmao").addClass("wrapper_fotos2");
$("#llmaov").removeClass("linkwrap");
$("#llmaov").addClass("linkwrap2");';
}else{
    $params['left_menu_added'].='
$("#llma").removeClass("wrapper_fotos");
$("#llma").addClass("wrapper_fotos2");
$("#llmav").removeClass("linkwrap");
$("#llmav").addClass("linkwrap2");';
}

$params['left_menu_added'].='
</script>
';
}
else if($_GET['sk']=="photos_stream"){
$params['left_menu_added'].='
<script type="text/javascript">
$("#llm'.$w.'").removeClass("wrapper_fotos2");
$("#llm'.$w.'").addClass("wrapper_fotos");
$("#llm'.$w.'v").removeClass("linkwrap2");
$("#llm'.$w.'v").addClass("linkwrap");';

if($_POST['repin']==2){
    $params['left_menu_added'].='
$("#llmaop").removeClass("wrapper_fotos");
$("#llmaop").addClass("wrapper_fotos2");
$("#llmaopv").removeClass("linkwrap");
$("#llmaopv").addClass("linkwrap2");';
}else{
    $params['left_menu_added'].='
$("#llmap").removeClass("wrapper_fotos");
$("#llmap").addClass("wrapper_fotos2");
$("#llmapv").removeClass("linkwrap");
$("#llmapv").addClass("linkwrap2");';
}

$params['left_menu_added'].='
</script>
';
}

if(isset($_GET['album'])){
$params['title']=$ralbumv;
$secho='<div style="margin-left:0px;margin-top:23px;">';
}
else{
$secho='<div style="margin-left:20px;display:inline-block;">';
}
$secho.=$echo;
$secho.='<script type="text/javascript">
$(document).on("click","._53f",function(e){
e.stopPropagation();
});
$(document).on("click",".getnext",function(){
eval($(this).data("onclick"));
});
$(".uiVideoLink").hover(function(){$(this).find(".playicon").addClass("playiconv"); $(this).find(".playicon").removeClass("playicon");},function(){$(this).find(".playiconv").addClass("playicon"); $(this).find(".playicon").removeClass("playiconv");});
</script>';
$secho.='</div>';
$echo=$secho;

if($_GET['sk']=="photos_stream" || $_GET['sk']=="photos_tagged"){
$params['layout']="left_column_w";
}
else if($_GET['sk']=="photos_albums"){
$params['layout']="normal_w";
}

$params['body_class']="scroll";

include("end.php");
?>