<?php
session_start();
if(!isset($_POST['media'])){
include("start.php");
}
if(isset($_POST['pin']) && $_POST['pin']=="2"){
    $pinboard=2;
}else{
    $pinboard=1;   
}

?>
<?php
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

 if(isset($_GET['a'])){
    $a=$_GET['a'];
    $c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM albums WHERE sbid='$a' AND pinboard='2'"));
    $c=$c['c'];
    if($c>0){
        $pinboard=2;  
        $_POST['pin_pagination']=2;
    }else{
        $pinboard=1; 
        $_POST['pin_pagination']=1;
    }
    
 }
 
include("browser_detect.php");

$user_browser = browser_detection('browser');
if($user_browser=="mozilla"){
$paupload='';
$tofupload='14';
$tofuploadvv='14';
$tofuploadv='120';
$leupload='121';
$diupload='none';
}
else{
$paupload='padding-right:2px;';
$tofuploadv='136';
$tofupload='10';
$tofuploadvv='14';
$leupload='114';
$diupload='block';
}
$uidv=$_POST['uidv'];
if(isset($_GET['album'])){
$uidva='albums';
$ralbum=$_GET['album'];
$albumid=$ralbum;

$result=mysql_query("SELECT * FROM $uidva WHERE id='$uidv' AND sbid='$ralbum'");
while($ms=mysql_fetch_array($result)){
$ralbumv=$ms['albumn'];
$location=$ms['location'];
$ddesc=$ms['descr'];

if(strpos($ddesc,"<b data-uidv")!==false){
    $html=$ddesc;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->setAttribute("data-uidv","");
        $node->nodeValue = $utivv['fullname'];
    }
    $ddesc="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $ddesc.=$dom->saveHTML($node);
    }

}


$ddescv=$ms['descr'];

if(strpos($ddescv,"<b data-uidv")!==false){
    $html=$ddescv;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->nodeValue = $utivv['fullname'];
    }
    $ddescv="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $ddescv.=$dom->saveHTML($node);
    }

}


}
}

if(isset($ralbumv)){
    if($ralbumv=="Profile Pictures" || $ralbumv=="Videos" || $ralbumv=="Photos" || $ralbumv=="Pins"){
$death_notice="t";
}
}

if(isset($ralbum) AND !isset($_POST['media'])){
$result=mysql_query("SELECT * FROM media WHERE albumid='$ralbum' AND id='$uidv' AND visibility!='d'");
$xg=mysql_num_rows($result);
}
else{$xg=0;}

if(!isset($_POST['media']) && ($_POST['switch']!=1) && !isset($_POST['fnf'])){
$rhelper_js='../';
}
else{$rhelper_js='';}
$nphotos='
<script type="text/javascript">
var filesup=new Array();';

if($pinboard=="2"){
    $nphotos.='var pinboard=true;';   
}else{
    $nphotos.='var pinboard=false;';
}

$nphotos.='
</script>

<input type="hidden" autocomplete="off" id="pinboard" name="pin" value="'.$pinboard.'">

<div style="display:none;" id="detect_faces" fjax="/stories/detect_faces.php" data-a_form="pic_info" data-a_custom_f="bqf" data-a_noabort="t"></div>
<div style="display:none;" id="pic_info">
<input type="hidden" name="sbid">
<input type="hidden" name="xpu">
<input type="hidden" name="fr">
</div>
<input type="hidden" id="faced_q">
<input type="hidden" id="arxpu">
<input type="hidden" id="arxpuv"><script type="text/javascript">$("#arxpuv").val(""); $("#arxpu").val("'.$xg.'");</script>
<script type="text/javascript" src="/tag/source/etiquetar.php"></script>
<script type="text/javascript">
(function ($) {
$.fn.vAlign = function() {
		return this.each(function(i) {
				var h = $(this).height();
				var oh = $(this).outerHeight();

	var mat=$(this).attr("id");
	mat=mat.replace("nphoto","");
	oh=290-h;

$("#nphotoc"+mat).css("margin-top",oh+"px");


		});
};
})(jQuery);
function autoGrowFieldta(f, max) {
	var max = (typeof max == \'undefined\')?1000:max;
	if (f.scrollHeight > max) {
			if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
			f.style.marginRight="0";
		f.style.marginLeft="0px";
		f.style.marginTop="0";
		f.style.marginBottom="0";
		f.style.height="60px";
		f.style.width="285px";
		return;
	}
	else{
		if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
		f.style.marginRight="0px";
		f.style.marginLeft="0px";
		f.style.marginTop="0px";
		f.style.marginBottom="0px";
		f.style.height="55px";
		f.style.width="285px";
		return;
	}
}
var noface=false;


var dcvvh=false;
var tincrease=false;
var write_only_array=new Array();
function bqf(xpu,photoid,selected_album,actual_pic,actual_pic4,rwidth,rheight,write_only){

if(write_only=="complete" || write_only=="write_only"){
write_only_array[xpu]=":"+xpu+"{}"+photoid+"{}"+selected_album+"{}"+actual_pic+"{}"+actual_pic4+"{}"+rwidth+"{}"+rheight;
}
if(write_only===undefined || write_only=="complete"){

if(write_only=="complete"){
var xpue=xpu;
}
else{
var response=xpu;
var res=response.split("{}");

var xpue=res[0];
f_gu[xpue]=res[1];

}

facedet_media("",xpue);
}

}

var recog_over=function(){$(this).removeClass("recog_hidden");}
var recog_out=function(){$(this).addClass("recog_hidden");}


function facedet_media(s,xpue){ //distinction in name due to mixup trouble with gallery viewer facedet

var dcv=write_only_array[xpue];

dcv=dcv.split("{}");
var xpu=dcv[0].replace(":","");
var photoid=dcv[1];
var selected_album=dcv[2];
var actual_pic=dcv[3];
var actual_pic4=dcv[4];
var rwidth=dcv[5];
var rheight=dcv[6];

if(xpu==xpue){

var aposlv=$("#pnphotoc"+xpu).offset().left;
var aposl=$("#nphoto"+xpu).offset().left;
var aposlvv=aposl-aposlv;

var lefttg=aposlvv-9;
lefttg=lefttg;

var fcount="";
var fcount2="";

var corder=xpu;

	if(strpos(f_gu[corder],",")!==false){
var coords=$.parseJSON(f_gu[corder]);
coords=coords.faces;
}
else{var coords=false;}


var imgw=rwidth;
var imgh=rheight;

			for (var i = 0; i < coords.length; i++) {

				var pcwidth=parseFloat(rwidth);
				var pcheight=parseFloat(rheight);
				var pposx=parseFloat(coords[i].positionX);
				var pposy=parseFloat(coords[i].positionY);
				var pcordsw=parseFloat(coords[i].width);
				var pcordsh=parseFloat(coords[i].height);

				var pposxp=pposx*100/imgw;
				var pposyp=pposy*100/imgh;
				var pcordswp=pcordsw*100/imgw;
				var pcordshp=pcordsh*100/imgh;

				var imgh=document.getElementById("nphoto"+xpu).clientHeight;
				var imgw=document.getElementById("nphoto"+xpu).clientWidth;




				var fw=pcordsw*imgw/pcwidth;
				var fwv=fw*26.65;
				fwv=fwv/100;
				fw=fwv+fw;

				var fh=pcordsh*imgh/pcheight;
				var fhv=fh*40;
				fhv=fhv/100;
				fh=fhv+fh;

				var fx=(pposx*imgw/pcwidth)+lefttg;
				var fwvv=fwv/1.5;
				fx=fx-fwvv;

				var fy=pposy*imgh/pcheight;
				var fhvv=fhv/1.5;
				fy=fy-fhvv;


						fx=fx*100/290;
						fy=fy*100/imgh;

					fw=fw*100/imgw;
					fh=fh*100/imgh;

				if(fx<1){fx=0;}
				if(fy<1){fy=0;}


var fx2=100-(fx+fw);
var fy2=100-(fy+fh);



		var pn=$("#ctoteti"+xpu).val();


		noface=false;

		pn=pn.split(",");
		$(pn).each(function(){
		if(this.length>0){

		var fwp=fw*100/imgw;
		var fwpv=fwp/2.2;

		var fhp=fh*100/imgh;
		var fhpv=fhp/2.2;


		var ca=$("#tag"+this).css("left");
		if(strpos(ca,"px")!==false){
		ca=parseInt(ca);
		var ca=ca*100/imgw;
		}
		px=parseFloat(ca);

		var pw=$("#tag"+this).css("width");
		if(strpos(pw,"px")!==false){
		pw=parseInt(pw);
		var pw=pw*100/imgw;
		}
		pw=parseFloat(pw);

		var cay=$("#tag"+this).css("top");
		if(strpos(cay,"px")!==false){
		cay=parseInt(cay);
		var cay=cay*100/imgh;
		}
		py=parseFloat(cay);

		var ph=$("#tag"+this).css("height");
		if(strpos(ph,"px")!==false){
		ph=parseInt(ph);
		var ph=ph*100/imgh;
		}
		ph=parseFloat(ph);


var plefttg=lefttg*100/290;

var px=px+plefttg;

var px2=100-(px+pw);
var py2=100-(py+ph);';

include("js/close_box.php");
$nphotos.=$secho_b;

$nphotos.='
		}
		});

				if(!noface){
				var count=Math.random();
count=count.toString();
count=count.replace(".","");
$("#maquina"+xpu).prepend(\'<div id="rec\'+count+\'" rel="\'+xpu+\'" class="recognitionBox recog_hidden" style="position:absolute;left:\'+fx+\'%;top:\'+fy+\'%;width:\'+fw+\'%;height:\'+fh+\'%;z-index:304;cursor:crosshair;background:transparent;"><div class="borderTagBox" style="background:transparent;z-index:304;"><div class="innerTagBox" style="background:transparent;z-index:304;"></div></div></div>\');

$("#rec"+count).bind("mouseover",recog_over);
$("#rec"+count).bind("mouseout",recog_out);

$("#rec"+count).click(function(){
$(this).css("z-index","-1");
$.doTimeout( 200, function(){
$(this).remove();
});

});

$("#rec"+count).hover(
function(){

},
function(){
//$("#pnphotoc"+xpu).css("z-index","5");
$("#nphotocc").css("z-index","4");
});

			}

			}


}


}
function adjustctot(){
var prectot=$("#prectot").val();
if(prectot!=""){
var offseto=$("#sortable").position().left;
var offsetov=$("#pnphotoc"+prectot).position().left;
var offsetovv=offsetov-offseto;
offsetovv=offsetovv+8;
offsetovv=offsetovv+"px";
$("#nphotoc").css("left",offsetovv);

var offseto=$("#sortable").position().top;
var offsetov=$("#pnphotoc"+prectot).position().top;

var offsetovv=offsetov-offseto;

offsetovv=offsetovv+"px";
$("#nphotoc").css("top",offsetovv);
}
$("b[data-t_id=adjustctot]").mouseenter();
}


$("#main_divg").append(\'<b data-t_f="adjustctot()" data-t_h="" data-t_t="100" data-t_id="adjustctot"></b>\');
$("b[data-t_id=adjustctot]").click();

function ruploadingvv(xpu){
$("#uploading"+xpu).css("display","none");
$("#pnphotoc"+xpu).css("display","inline-block");


var prectot=$("#prectot").val();
$("#nphotoc").css("opacity","1");
}

function ruploadingv(){
var prectot=$("#prectot").val();
var oleft=$("#nphotoc"+prectot).attr("offsetLeft");
var otop=$("#nphotoc"+prectot).attr("offsetTop");

$("#nphotoc").css("left",oleft);
$("#nphotoc").css("top",otop);
}
function ruploading(){
setTimeout("ruploadingv()",200);
}

var dance=false;
function iuploading(){
if(!iposi){clearTimeout(tincrease);}
var xpuv=$("#axr").val();
var isitdone=$("#uploading"+xpuv).css("display");
if(isitdone=="none"){clearTimeout(tincrease); return;}
var awidth=$("#iuploading").val();
awidth=parseInt(awidth);
awidth=awidth+1;

if(awidth>100){
clearTimeout(tincrease);
return;
}


if(dance){
if(awidth>dance){
dance=false;
}
$("#iuploading").val(awidth);
}


var xpu=$("#xpu").val();

$("#uploadingv"+xpuv).css("width",awidth+"%");

if(iposi){
if(awidth>5){
var pposiv=awidth/100*iposi;
pposiv=pposi+pposiv;
$("#iuploadingv").css("width",pposiv+"%");
}


if(awidth=="95"){clearTimeout(tincrease);}
else if(awidth>60){tincrease=setTimeout("iuploading()",30);}
else{tincrease=setTimeout("iuploading()",30);}
}
}

function simupload(w){
$("#"+w).click();
}

var ccnt=false;
var keko=false;
										function acas() {
							$.ajax({
	type: "POST",
	url: "/progress.php",
	data: {ccnt:ccnt }}).done(
function(response) {if(response=="100"){}
else{
var aupl=$("#iuploading").val();
if(response>aupl){
if(dance){if(response==dance){}else{dance=response;}}
else{dance=response;}
}
$.doTimeout(0,function(){acas();});
}



});


										}
var iposi=false;
var pposi=0;
var upload_active=false;

var cprocess=0;

var acprocessn=0;
var particular;
var tuploadsession=0;
var uploadsession=0;
var u_dtotal=new Array();
var currentupload=0;
var currentupload_counter=0;

function upload_error(w){
$("#uploading"+w).after(\'<li style="display:inline-block;float:left;width:308px;margin-bottom:15px;text-align:center;" id="anerror\'+w+\'" class="x editablePhoto editablePhotoPlaceholder editablePhotoErrorPlaceholder imgerror"><div class="photoWrap" style="width:290px;display:inline-block;"><div class="error"><span class="uiIconText title"><i class="img alertita"></i>Bad Image</span><div class="mts uiP description fsm">There was a problem with the image file.</div></div><div class="border"></div></div><div class="inputs"><div class="editablePhotoPlaceholderStatus fsm fwn fcg"></div></div></li>\');
$("#uploading"+w).remove();

xpur=w-1-'.$xg.';

xpuv=w-1;

var xpu=$("#xpu").val();
xpu=parseInt(xpu);
xpu=xpu-1;

$("#xpu").val(xpu);

var ax=w+1;
var xv=0;
while(ax<=xpuo){
xv=ax-1;
$("#uploading"+ax).attr("id","uploading"+xv);
$("#uploadingv"+ax).attr("id","uploadingv"+xv);
$("#uploadingm"+ax).attr("id","uploadingm"+xv);
$("#uploadingt"+ax).attr("id","uploadingt"+xv);
ax++;
}

var arxpu=$("#arxpu").val();
arxpu=parseInt(arxpu);
if(arxpu==1){arxpu="";}
else{arxpu=arxpu-1;}
$("#arxpu").val(arxpu);
$("#arxpuv").val(arxpu);
$("#axr").val(arxpu);

document.title=cuploaded+"/"+xpuo+" Uploaded...";

return true;
}

var cuploaded=0;

function sendp(xh,t,w){
	var rfile=w[xh];

	if(rfile===undefined){

	var totextarea="";


	$(w).each(function(k,v){

	totextarea+="["+k+":"+v+"] ->";
	$(this).each(function(k2,v2){
	totextarea+="["+k2+":"+v2+"] .";
	});


	});

	//alert(totextarea);
	$("#totextarea").val(totextarea);
	//alert(xh); //alert(t); //alert(w);


	}
	var acprocess=w;
	var parsed=xh-1;

	var tparsed=uploadsession;
	if(tparsed<xpuo){
		var posi=100/tuploadsession; iposi=posi;
		var xv=uploadsession+1;
		posi=posi*xv;
		$("#posi").val(posi);

		pposi=100/tuploadsession*tparsed;
		$("#iuploadingv").css("width",pposi+"%");




	}

var arxpu=$("#arxpu").val();

if(arxpu==""){arxpu=0;}
arxpu=parseInt(arxpu);
arxpu=arxpu+1;

$("#arxpu").val(arxpu);
$("#axr").val(arxpu);

var upx=arxpu;

$("#uploadingm"+upx).css("background","#ffffff");
$("#uploadingm"+upx).css("height","20px");
$("#uploadingm"+upx).css("border-color","rgb(164, 164, 164) rgb(187, 187, 187) rgb(213, 213, 213)");

$("#uploadingt"+upx).css("opacity","1");

$("#uploadingv"+upx).css("width","1px");



$("#iuploading").val("1");

tincrease=setTimeout("iuploading()",50);

var xhrq = new XMLHttpRequest();
	var form = new FormData();
	var count=retcount();
	var file = "upload_"+count;
	form.append("'.ini_get("session.upload_progress.name").'",file);
	var file = $("#MAX_FILE_SIZE").val();
	form.append("MAX_FILE_SIZE", file);
	var file = $("#selected_album").val();
	form.append("selected_album", file);

	var file = $("#location").val();
	form.append("location", file);
	
	var file = $("#cityc"+upx).val();
	form.append("cityc", file);
	
	var file = $("#statec"+upx).val();
	form.append("statec", file);

	var file = $("#countryc"+upx).val();
	form.append("countryc", file);
        
	var file = $("#pinboard").val();
	form.append("pin", file);
	
	var file = $("#submit2").val();
	form.append("submit2", file);
	var file = $("#arxpu").val();
	form.append("xr", file);

	var file="h";
	form.append("uploader_vis",file);

	var file=count;
	form.append("cnt",file);

	ccnt=count;



	// //alert(acprocess+x+file);
	form.append("uploadedfile[]", rfile);

				xhrq.upload.onprogress = function(e){
					if (e.lengthComputable){
								var d=e.lengthComputable;

			//	var rog=Math.round(e.loaded/e.total);
			//	rog=Math.round(rog*100);

				}
			};



			xhrq.onreadystatechange = function(){
						if (xhrq.readyState == 4){
			cuploaded++;
		if(xhrq.responseText=="{}e9"){
		upload_error(upx);

		}
		if(xhrq.responseText=="e10{}"){
		$(".uioverlayi").append(\'<div id="album_full" class="displaydialog hidden_sb" data-d_overlay="white_create" data-d_title="Upload Error" data-d_okay="Close" data-d_okay_function="close_dialog"></div><div class="dialog_msgs">This album is full. If you\\\'d like to upload more pictures, please create a new album.</div>\');
		$("#album_full").click();
		var kill_upload="t";
		$(".imguploading:last").remove();
		$(".uploadedfile:last").unbind("change");
		$("#photouploader,#morephotosu").unbind("click");
		$("#photouploader,#morephotosu").bind("click",function(){
		$("#album_full").click();	
		});
						
		$("#iuploadingv").css("width","100%");
		document.title="Upload Complete";
		return false;
		}
		else{
		var kill_upload="f";	
		}
		if(kill_upload=="t"){
		return false;	
		}

				var parsed=xh+1;
		//	//alert(xhrq.responseText);
				updateu(xhrq.responseText);

			uploadsession++;

					if(parsed<t){pposi=posi; $("#iuploadingv").css("width",posi+"%"); sendp(parsed,t,w);}
			else{
			var totaluploaded=$("#arxpuv").val();

			if(q.length==0){
			upload_active=false;
			uploadsession=0;
			tincrease=clearTimeout(tincrease);  iposi=false; pposi=0; $("#iuploadingv").css("width","100%");
			}
			else{
			next();
			}


			}

			}
				};

	xhrq.open("POST", "/add_photos2.php",true); //async false!!!!!!!! puede ser async, pero solo se debe de volver a ejecutar una vez que se recibe la
	//respuesta
	xhrq.send(form);
	acas();


}



var q      = [];
var paused = false;

function queue() {
for(var i=0;i< arguments.length;i++)
		q.push(arguments[i]);
}
function dequeue() {
		if(!empty()) q.pop();
}
function next() {
		if(empty()) return; //check that we have something in the queue
		paused=false; //if we call the next function, set to false the paused
		q.shift()(); // the same as var func = q.shift(); func();
}
function flush () {
		paused=false;
		while(!empty()) next(); //call all stored elements
}
function empty() {  //helper function
		if(q.length==0) return true;
		return false;
}
function clear() {
		q=[];
}


function submitu(w){
if(w===undefined){
w="uploadedfile";
}

$("#"+w).unbind("change");

var count=retcount();

actual_input_file="uploadedfile"+count;

$("#"+w).after(\'<input name="uploadedfile[]" class="uploadedfile" id="uploadedfile\'+count+\'" style="display:none;" type="file" multiple="" style="margin-top:15px;cursor:pointer;"/>\');

$("#uploadedfile"+count).bind("change",function(){
submitu("uploadedfile"+count);
});

$("#"+w).attr("disabled",true);
$("#morephotosu").attr("disabled",true);

cprocess++;

var dcprocess="a"+cprocess;
dcprocess=dcprocess.toString();

filesup[dcprocess]=document.getElementById(w).files;

var input = document.getElementById(w).files;


$("#morephotosu").attr("disabled",false);

';
if($user_browser=="chrome"){
$nphotos.='$("#hqv").css("top","-1px");';
}
$nphotos.='
//$("#morephotosu").disabled=true;

$(\'<iframe style="visibility:hidden;position:absolute;left:-250px;display:none;top:-150%;" name="likeframe" id="likeframe">\').appendTo(\'body\');

var xpu=$("#xpu").val();
$("#pxpu").val(xpu);
xpu=parseInt(xpu)+1;
$("#xr").val(xpu);

var x=0;


var gvar="110";
yxpu=parseInt(xpu);
var cvar=yxpu+2;
var my=3;
var remainder = cvar % my;
if (remainder == 0){
gvar="0";
}
gvar="-180";


for (var xd = 0; xd < input.length; xd++) {
var xpu=$("#xpu").val();
xpu++;
$("#xpu").val(xpu);
xpuo++;


$(\'#sortable\').append(\'<li name="obs" style="float:left;width:308px;height:290px;vertical-align:bottom;display:inline-block;margin:0;padding:0;font-weight:normal!important;position:relative;" class="x imguploading" id="uploading\'+xpu+\'"><div style="margin:0;padding:0;margin-top:165px;text-align:center;display:inline-block;"><div style="display:inline-block;margin:9px;margin-bottom:0;margin:0px;padding:0;height:22px;width:288px;background:none repeat scroll 0% 0% rgb(242, 242, 242);position:relative;border:1px solid;border-color:#ffffff;" id="uploadingm\'+xpu+\'"><div style="position:absolute;left:0;height:20px;background:#7280AE;width:0px;" id="uploadingv\'+xpu+\'"></div></div><div style="margin:0;margin-top:5px;padding:0;color:gray;text-align:center;opacity:0;" id="uploadingt\'+xpu+\'">Uploading...</div></div></li>\');

emulate_sort_update();
}


var arxpuv=$("#arxpuv").val();
if(arxpuv==""){arxpuv=0;}


document.title=cuploaded+"/"+xpuo+" Uploaded...";




$("#progressbars").css("display","inline-block");

$("#photouploader").css("display","none");
$("#fuploader").css("display","none");
$("#nphotoc").css("opacity","0");


//ponerlo en la cola, sino esta activo y no hay nada en la cola

u_dtotal[currentupload_counter]=document.getElementById(w).files.length;
currentupload_counter++;

if(!upload_active){
queue(function() {sendp(0,document.getElementById(w).files.length,document.getElementById(w).files); });
upload_active=true;
tuploadsession=document.getElementById(w).files.length;
next();
}
else{
				currentupload++;
				var a_total=u_dtotal[currentupload];
				tuploadsession=tuploadsession+a_total;

					var tparsed=uploadsession;
	if(tparsed<xpuo){
		var posi=100/tuploadsession; iposi=posi;
		var xv=uploadsession+1;
		posi=posi*xv;
		$("#posi").val(posi);

		pposi=100/tuploadsession*tparsed;
		$("#iuploadingv").css("width",pposi+"%");




	}

//ponerlo en cola
queue(function() {sendp(0,document.getElementById(w).files.length,document.getElementById(w).files); });
}






}


$(document).off("blur",".wherew").on("blur",".wherew",function(e,a){
if(a=="dcph"){e.stopPropagation(); return false;}
else{clearwwv($(this).attr("rel")); changeplv($(this).attr("rel"),$(this).attr("data-sbid"),e);}
});';

if(!isset($_POST['media'])){
$data_t_fixedv='$(this).attr("data-t_fixed","t");';
}
else{
$data_t_fixedv='';
}

$nphotos.='
$(document).off("click",".filter").on("click",".filter",function(){

if(active_conversion=="t" && $(this).hasClass("filter_working")===false){
if($(this).attr("data-t_filter_wastipped")!==undefined){return false;}
$(this).attr("data-t_filter_wastipped","t");
$(this).attr("data-t_activation","click");
'.$data_t_fixedv.'
$(this).attr("data-t_text","Filter conversion in progress... please wait");
$(this).mouseover();
$(this).click();
return false;
}
$(".filter").removeClass("filter_working");
$(this).addClass("filter_working");
$(this).parents(".cacuna").eq(0).find(".filters").css("display","block");

$(".filters_selection_wrapper").addClass("hidden_sb");

$(".jTagSaveClose").click();

$(".clicktt").css("visibility","hidden");
$(".clicktt").css("z-index","4");
$(".currentp").css("visibility","hidden");
$(".currentp").css("z-index","3");
$(".says").css("visibility","visible");
$(".says").css("z-index","5");

$(".desc_o").removeClass("hidden_sb");

var dli=$(this).parents(".ui-state-defaultv").eq(0);
$(dli).find(".desc_o").addClass("hidden_sb");
//description_other..
$(dli).find(".filters_selection_wrapper").removeClass("hidden_sb");
$(".marco").addClass("hidden_sb");
$(".drop").addClass("hidden_sb");
$(".brightness").addClass("hidden_sb");
$(".contrast").addClass("hidden_sb");
var brightness_opened=$(dli).find(".brightness_slider").css("opacity");
var contrast_opened=$(dli).find(".contrast_slider").css("opacity");
$(document).click();

$(".brightness_slider").addClass("hidden_sb");
$(".contrast_slider").addClass("hidden_sb");

$(".colorpickers").addClass("hidden_sb");
$(dli).find(".marco").removeClass("hidden_sb");
$(dli).find(".drop").removeClass("hidden_sb");
$(dli).find(".brightness").removeClass("hidden_sb");
$(dli).find(".contrast").removeClass("hidden_sb");
if(brightness_opened!="0"){
$(dli).find(".brightness_slider").removeClass("hidden_sb");
}
if(contrast_opened!="0"){
$(dli).find(".contrast_slider").removeClass("hidden_sb");
}
$(dli).find(".colorpickers").removeClass("hidden_sb");

});

$(document).off("click",".location_i").on("click",".location_i",function(){
var dli=$(this).parents(".ui-state-defaultv").eq(0);
$(dli).find(".filters_selection_wrapper").addClass("hidden_sb");
$(dli).find(".marco").addClass("hidden_sb");
$(dli).find(".drop").addClass("hidden_sb");
$(dli).find(".brightness").addClass("hidden_sb");
$(dli).find(".contrast").addClass("hidden_sb");
$(dli).find(".brightness_slider").addClass("hidden_sb");
$(dli).find(".contrast_slider").addClass("hidden_sb");
$(dli).find(".colorpickers").addClass("hidden_sb");

//description_other..
$(dli).find(".desc_o").removeClass("hidden_sb");
});

$(document).off("click",".ctot_default").on("click",".ctot_default",function(){
var dli=$(this).parents(".ui-state-defaultv").eq(0);
$(dli).find(".filters_selection_wrapper").addClass("hidden_sb");
$(dli).find(".marco").addClass("hidden_sb");
$(dli).find(".drop").addClass("hidden_sb");
$(dli).find(".brightness").addClass("hidden_sb");
$(dli).find(".contrast").addClass("hidden_sb");
$(dli).find(".brightness_slider").addClass("hidden_sb");
$(dli).find(".contrast_slider").addClass("hidden_sb");
$(dli).find(".colorpickers").addClass("hidden_sb");
//description_other..
$(dli).find(".desc_o").removeClass("hidden_sb");
});';


include("js/filters_create.php");
$nphotos.=$sechov;


$nphotos.='
var filters="";
var ax=1;
$(filters_create).each(function(k,v){
var dclass="";
if(ax==1 || ax==5 || ax==9 || ax==13 || ax==17 || ax==21 || ax==25 || ax==29 || ax==33 || ax==37 || ax==41){
dclass+=" start_row ";
}
if(ax>4){
dclass+=" secondaryColumn ";
}
if(ax==4 || ax==8 || ax==12 || ax==16 || ax==20 || ax==24 || ax==28 || ax==32 || ax==36 || ax==40 || ax==44){
dclass+=" last_cell ";
}
var filter_type=v;
if(filter_type=="wrinkle_reducer" || filter_type=="eight_bits" || filter_type=="custom" || filter_type=="lensflare" || filter_type=="boost" || filter_type=="flashy" || filter_type=="drawing" || filter_type=="sketch" || filter_type=="superman" || filter_type=="church" || filter_type=="cartoon_iii" || filter_type=="black_white_sketch"){
dclass+=" sketch_filter ";
}
else if(filter_type=="black_white_sketch"){
dclass+=" black_white_sketch_filter ";
}
var filter_type_text=filters_create_text[k];
filters+=\'<input type="button" class="hidden_sb filter_trigger"><div style="display:inline-block;float:left;" class="\'+dclass+\' filter_selection_wrapper filter_unselected" data-f_apply="f" data-f_type="\'+filter_type+\'"><div class="filter_mask hidden_sb"></div><img style="float:left;" class="filter_selection" src="/images/filter_\'+filter_type+\'.png"><div class="filter_selected_wrapper hidden_sb" data-t_text="Filter applied" data-t_position="bottom"><i class="filter_selected"></i></div><div class="filter_selection_text_wrapper"><div class="fwb filter_selection_text">\'+filter_type_text+\'</div></div></div>\';
ax++;
});';


$nphotos.='
$(document).off("click",".mphoto,.recognitionBox").on("click",".mphoto,.recognitionBox",function(e){
if($(this).hasClass("recognitionBox")===true){
var thisv=$(this).parents(".ui-state-defaultv").eq(0).find(".mphoto");
}
else{
var thisv=$(this);
}
ctot($(thisv).attr("rel"),$(thisv).attr("data-ctot_thephotol"),$(thisv).attr("data-ctot_thephotom"),$(thisv).attr("data-ctot_thephoto"),$(thisv).attr("data-ctot_wwidthpr"),$(thisv).attr("data-ctot_wheightpr"),$(thisv).attr("data-ctot_photoid"),$(thisv).attr("data-ctot_wctotv"),e);
});


var maquina_hidepo=function(){
hidepo($(this).attr("rel"));
}

$(document).off("mouseleave",".maquina",maquina_hidepo);
$(document).on("mouseleave",".maquina",maquina_hidepo);

var maquina_displaypo=function(){
displaypo($(this).attr("rel"));
}

$(document).off("mouseenter",".maquina",maquina_hidepo);
$(document).on("mouseenter",".maquina",maquina_hidepo);

var maquina_hidepov=function(){
hidepo();	
}

$(document).off("mouseleave","#maquina",maquina_hidepov);
$(document).on("mouseleave","#maquina",maquina_hidepov);

var maquina_displaypov=function(){
displaypo($(this).attr("rel"));	
}

$(document).off("mouseenter","#maquina",maquina_displaypov);
$(document).on("mouseenter","#maquina",maquina_displaypov);

$(document).off("mouseenter",".maquina",maquina_displaypov);
$(document).on("mouseenter",".maquina",maquina_displaypov);

var tagoverlay_setb=function(){
setb();	
}

$(document).off("mouseleave","#tagoverlay",tagoverlay_setb);
$(document).on("mouseleave","#tagoverlay",tagoverlay_setb);

var tagoverlay_setbv=function(){
setbv();	
}

$(document).off("mouseenter","#tagoverlay",tagoverlay_setbv);
$(document).on("mouseenter","#tagoverlaya",tagoverlay_setbv);

var original_doc_title=document.title;';

$secho='';

include("ajax/common/set_photo_location.php");

$nphotos.=$secho;

$nphotos.='
var f_gu=new Array();

function updateu(response){
//alert(response);

var response=response.split("{}");
var faces=response[1];';

if(isset($_POST['media'])){
$nphotos.='
var ddesc=response[2];
var ddescv=response[3];
';
}

$nphotos.='
var response=response[0];

var res=$.parseJSON(response);

var xpu=res.xr;

var cityc=res.cityc;


var arxpuv=$("#arxpuv").val();
if(arxpuv==""){arxpuv=0;}
arxpuv=parseInt(arxpuv);
arxpuv=arxpuv+1;
$("#arxpuv").val(arxpuv);
';

if(!isset($_POST['media'])){
$nphotos.='
if(cuploaded==xpuo){
document.title="("+xpuo+") Upload Complete";


$("#morephotosu").attr("disabled",false);

}
else{
document.title=cuploaded+"/"+xpuo+" Uploaded...";
}
';
}
$nphotos.='
var heightd=res.height-2;';

if(!isset($_POST['media'])){

$nphotos.='';
}


$nphotos.='

var filter=res.filter;
var photoid=res.photoid;
var thephoto=photoid;
var thephotom=res.actual_pic4;
var thephotol=res.actual_pic;

$("#thephotol").val(res.actual_pic);
$("#thephotom").val(res.actual_pic4);
$("#thephoto").val(res.photoid);

var wheightp=res.height;
var wwidthp=res.width;

var rheightp=res.heightv;
var rwidthp=res.widthv;

var wheightpr=Math.floor(wheightp*100/rheightp);
var wwidthpr=Math.floor(wwidthp*100/rwidthp);

$("#wwidthp").val(wwidthpr);
$("#wheightp").val(wheightpr);

var location=$("#location").val();

if(location!=""){var classv="locv";}
else{var classv="loc";}
var wctot="bottom";
var wctotv="top";
res1p=parseInt(res.height);
var dpx=290-res.height;
var dpxv=res1p+87;
var xpunt=xpu+"nt";

var pb="";
var my=3;
var remainder = xpu % my;
if (remainder == 0){
pb=\'\';
}';

if(isset($_POST['media'])){
$nphotos.='$(\'#sortable\').append';
$wd='inline-block';
$data_t_fixed="";
$data_c_fixed="";
}
else{
$wd='none';
$nphotos.='$(\'#uploading\'+xpu).before';
$data_t_fixed=' data-t_fixed="t" ';
//$data_c_fixed=' data-c_fixed="t" ';
$data_c_fixed="";
}
if($pinboard=="1"){
    $dtext="Say something about this photo...";   
    $dtextv=$dtext;
}else{
    $dtext="Say something about this pin...";
    $dtextv=$dtext;
}

if(isset($_POST['media'])){
$dval='-11px';
$dvalv='286';
}else{
$dval='-3px';
$dvalv='288';
}

$nphotos.='(\'<li data-xpu="\'+xpu+\'" class="x ui-state-default ui-state-defaultv photo_container" id="pnphotoc\'+xpu+\'" data-sbid="\'+photoid+\'" style="display:'.$wd.';font-weight:normal!important;vertical-align:bottom;width:308px;margin:0px;padding:0;margin-bottom:15px;text-align:center;position:relative;z-index:5;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;float:left;" onmouseover="updatexpu($(this).attr(\\\'rel\\\'));" rel="\'+xpu+\'"><div style="line-height:15px;"><div id="pnphotoco\'+xpu+\'" style="width:288px;height:\'+heightd+\'px;position:absolute;display:none;background-color:rgba(231,235,243,0.60);z-index:700;border:1px solid rgba(231,235,243,0.60);"></div><div style="margin:0;margin-bottom:0px;padding:0;display:inline-block;vertical-align:bottom;position:relative;" id="nphotoc\'+xpu+\'" name="\'+xpu+\'" class="cacuna"><div onmouseover="" onmouseout="" style="display:inline-block;width:288px;height:\'+heightd+\'px;vertical-align:bottom;text-align:center;margin:0px;margin-top:0;margin-bottom:0;padding:0;border:1px solid;-moz-border-colors:none;-moz-border-image:none;border-color:transparent;position:relative;background-color:#ffffff;"><div style="z-index:-1;visibility:hidden;position:absolute;text-align:center;width:120px;margin:0 auto;padding:2px 0pt 1px;left:50%;top:5px;margin-left:-65px;color:#333333;background-color:#ffffff;border:1px solid rgb(204,204,204);box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);cursor:crosshair;" id="clickaf\'+xpu+\'" onmouseover="clearop(\'+xpu+\');" onclick="clearop(\'+xpu+\');">Click a face to tag</div><img class="deav" src="/'.$uid.'/pics/\'+res.actual_pic4+\'" id="nphoto\'+xpu+\'" onmouseover="" style="cursor:crosshair;display:inline-block;position:relative;top:-1px;left:-1px;height:\'+wheightp+\'px;width:\'+wwidthp+\'px;"><div style="position:absolute;width:100%;text-align:center;top:0;height:100%;background:rgba(255,255,255,0.5);" class="loading_filter hidden_sb"><div style="position:relative;display:inline-block;width:16px;height:11px;background-image:url(/images/loading.gif);"></div></div></div><div style="position:absolute;width:288px;height:\'+heightd+\'px;margin-top:-\'+wheightp+\'px;text-align:center;" rel="\'+xpu+\'" id="maquina\'+xpu+\'" class="maquina maquina_border"><div class="selectop" style="top:10px;z-index:-1;visibility:hidden;" id="selectop\'+xpu+\'" rel="\'+xpu+\'" onclick="displaypm($(this).attr(\\\'rel\\\'));" data-t_text="Select an option" '.$data_t_fixed.'></div><div id="selectopu\'+xpu+\'" rel="\'+xpu+\'" class="selectopu" style="position:absolute;right:10px;top:28px;z-index:304;display:none;" onmouseover="displaypov($(this).attr(\\\'rel\\\'))" onmouseout="doitvv();"><div class="itema" rel="\'+xpu+\'" onclick="makealbcover(\\\'\'+photoid+\'\\\',$(this).attr(\\\'rel\\\'));" id="albcoverl\'+xpu+\'" style="text-align:left;">Make album cover</div><div class="itema" style="text-align:left;" rel="\'+xpu+\'" onclick="remove_pic($(this).attr(\\\'rel\\\'),\\\'\'+photoid+\'\\\');">Remove this photo</div></div><div style="cursor:crosshair;display:inline-block;position:relative;top:-1px;left:-1px;height:\'+wheightp+\'px;width:\'+wwidthp+\'px;" rel="\'+xpu+\'" id="mphoto\'+xpu+\'" class="mphoto" data-ctot_thephotol="\'+thephotol+\'" data-ctot_thephotom="\'+thephotom+\'" data-ctot_thephoto="\'+thephoto+\'" data-ctot_wwidthpr="\'+wwidthpr+\'" data-ctot_wheightpr="\'+wheightpr+\'" data-ctot_photoid="\'+photoid+\'" data-ctot_wctotv="\'+wctotv+\'"></div></div><div style="height:66px;width:288px;padding:0px;margin-left:0px;margin-right:0px;border:1px solid #dddddd;border-top:0;position:relative;top:0px;z-index:5;background-color:#ffffff;" class="desc_o"><div id="clicktt\'+xpu+\'" style="visibility:hidden;z-index:3;width:288px;text-align:center;margin-top:20px;color:gray;font-weight:bold;font-size:13px;position:absolute;" class="clicktt">Click a face to tag</div><div id="currentp\'+xpu+\'" style="visibility:hidden;z-index:4;margin;0;height:45px;vertical-align:top;position:absolute;overflow-y:auto;overflow-x:hidden;padding:5px;text-align:left;" class="currentp"></div><div style="position:relative;" class="highlighter_wrapper"><div class="uiMentionsInput _11a"><div class="highlighter" style="padding: 4px 5px;width:100%;height:45px;overflow:hidden;"><div style="width:auto;text-align:left;"><div class="highlighterContent" style="max-width:100%;width:100%;vertical-align:top;display:inline-block;position:relative;color:transparent;"></div><div class="highlighterAuxContent" style="vertical-align:top;display:inline-block;position:relative;"><div class="metadataFragment"></div></div></div></div><div style="background: none repeat scroll 0% 0% transparent;height:auto;border:0px none;" class="uiTypeahead composerTypeahead mentionsTypeahead"><div style="padding:5px;border:0px none;" class="step_autocomplete"><div style="overflow:hidden;cursor:default;"><textarea style="height:45px;min-height:45px;cursor:text;visibility:visible;z-index:5;width:280px;height:45px;background-color:transparent;" class="uiTextareaAutogrow input mentionsTextarea textInput dcphogc says to_highlighter" title="'.$dtext.'" placeholder="'.$dtext.'" name="description" rel="\'+xpu+\'" onfocus="hidepov($(this).attr(\\\'rel\\\')); extraph2(this); clears($(this).attr(\\\'rel\\\'));" onblur="extraph(this); changepd($(this).attr(\\\'rel\\\'),\\\'\'+res.photoid+\'\\\');" written="" id="says\'+xpu+\'" onkeydown="autoGrowFieldta(this,66); $(this).attr(\\\'written\\\',\\\'t\\\');"></textarea></div></div><div><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="autocomplete_findme inputtext dcphlgc displaynoneimportant hidden_sb" data-ac_enable="wall_uploaderdv\'+xpu+\'" data-ac_liwidth="'.$dvalv.'" data-ac_inputw="280" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_custom_f="add_to_highlighter" data-ac_placeholder="Who where you with?" data-ac_position="fixed" data-ac_custom_ul=\\\'$(this).css("margin-left","'.$dval.'"); $(this).css("margin-top","-12px");\\\'></div><input type="hidden" name="descriptionv" autocomplete="off"></div></div></div></div><div id="editpiw\'+xpu+\'" style="margin:0;padding:0;display:inline-block;position:relative;left:-1px;top:-25px;width:100%!important;"><div id="editpiwv\'+xpu+\'" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;" class="hidden_sb"><input type="text" id="city\'+xpu+\'" class="wherew dcph" style="bottom:-1px!important;z-index:6;color:gray;border:1px solid rgb(189, 199, 216);z-index:2;visibility:hidden;background-color:transparent;width:280px!important;left: 0px;" value="" placeholder="Where was this?" rel="\'+xpu+\'" onfocus="hidepov(\$(this).attr(\\\'rel\\\')); clearww($(this).attr(\\\'rel\\\'));" data-sbid="\'+photoid+\'"><label id="removeedit\'+xpu+\'" class="removeedit" style="display:none;z-index:10;" title="Remove" onclick="swapc(1,\'+xpu+\');"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label></div></div></div><div style="height:66px;width:288px;padding:0px;margin-left:0px;margin-right:0px;border:1px solid #dddddd;border-top:0;position:relative;top:0px;z-index:5;background-color:#ffffff;display:block;overflow-y:auto;" data-yk="\'+xpu+\'" class="filters_selection_wrapper filters_edit_wrap hidden_sb"></div><div style="border:1px solid;border-color:rgb(221,221,221);line-height:0;margin:0;background-color:rgb(242,242,242);margin-right:0px;margin-left:0px;padding:0;position:relative;top:-2px;height:30px;width: 288px;left: 0px;z-index:6;"><div class="ctot bottom_menu_photo ctot_default" rel="\'+xpu+\'" id="ctot\'+xpu+\'" onclick="hidepov($(this).attr(\\\'rel\\\')); ctot($(this).attr(\\\'rel\\\'),\\\'\'+thephotol+\'\\\',\\\'\'+thephotom+\'\\\',\\\'\'+thephoto+\'\\\',\\\'\'+wwidthpr+\'\\\',\\\'\'+wheightpr+\'\\\',\\\'\'+photoid+\'\\\',\\\'\'+wctot+\'\\\');"><div style="margin:0;padding:0;font-weight:bold;margin:14px 5px 0pt 26px;line-height:0;z-index:10;" id="ctotv\'+xpu+\'"></div></div><div id="loc\'+xpu+\'" rel="\'+xpu+\'" class="bottom_menu_photo location_i \'+classv+\'" onclick="hidepov($(this).attr(\\\'rel\\\')); showwp($(this).attr(\\\'rel\\\'));"></div>';


$nphotos.='<div class="bottom_menu_photo filter" style="cursor:pointer;"></div><div class="hidden_sbr filter_options"><input type="hidden" value="1" name="frame"><input type="hidden" value="1" name="frame_original"><input type="hidden" name="tilt_shift" value="2"><input type="hidden" name="tilt_shift_original" value="2"><input type="hidden" name="custom_color" value=""><input type="hidden" name="custom_hsb" value=""><input type="hidden" name="brightness" value="0"><input type="hidden" name="contrast" value="0"></div><div class="bottom_menu_photo colorpickers hidden_sb" style="cursor:pointer;float:right;" '.$data_c_fixed.' data-t_text="Open Color Picker" '.$data_t_fixed.'><div class="colorpickers_mask div_mask hidden_sb"></div></div><div class="bottom_menu_photo drop hidden_sb" style="cursor:pointer;float:right;" data-t_text="Toggle tilt shift on/off" '.$data_t_fixed.'><div class="drop_mask div_mask hidden_sb"></div></div><div class="bottom_menu_photo contrast hidden_sb" style="float:right;cursor:pointer;" data-t_text="Adjust contrast" data-t_align="center" '.$data_t_fixed.'><div class="contrast_mask div_mask hidden_sb"></div></div><div class="hidden_sb contrast_slider"></div><div class="bottom_menu_photo brightness hidden_sb" style="float:right;cursor:pointer;" data-t_text="Adjust brightness" data-t_position="bottom" data-t_align="center" '.$data_t_fixed.'><div class="brightness_mask div_mask hidden_sb"></div></div><div class="hidden_sb brightness_slider"></div><div class="bottom_menu_photo marco marco_active hidden_sb" style="float:right;cursor:pointer;" data-t_text="Toggle frame on/off" data-t_position="bottom" data-t_align="center" '.$data_t_fixed.'><div class="marco_mask div_mask hidden_sb"></div></div>';


$nphotos.='</div></div><input type="hidden" id="toteti\'+xpu+\'" value="0"><input type="hidden" id="ctoteti\'+xpu+\'" value=""><input autocomplete="off" type="hidden" id="statec\'+xpu+\'"><input autocomplete="off" type="hidden" id="countryc\'+xpu+\'"><input autocomplete="off" type="hidden" id="cityc\'+xpu+\'"><input autocomplete="off" type="hidden" id="stateedit\'+xpu+\'"><input autocomplete="off" type="hidden" id="cityv\'+xpu+\'"></div></li>\'+pb+\'\');

$(".to_highlighter:last").bind("keyup",to_highlighter_keyup);
$(".to_highlighter:last").bind("scroll",keep_scroll_to_highlighter);
$(".to_highlighter:last").bind("keyup",keep_scroll_to_highlighter);

$(document).ready(function(){
$("[data-ac_enable=wall_uploaderdv"+xpu+"]").click();
});

//$("#wherew"+xpu).css("border","3px solid blue"); in here add autocomplete from /editprofile/basic.php, made adjustments to the tables and adjust on other files such
//as gallery viewer or view_photos.php lately

$(".ui-state-defaultv:last").find(".filters_selection_wrapper").html(filters);

$("#city"+xpu).keyup(function(){
var dval=$(this).val();
dov(dval,xpu);	
});

';

$nphotos.='
var v=res.v;
var cityc=res.cityc;
var countryc=res.countryc;
var statec=res.statec;

if(v!=""){
				$("#editpiw"+xpu).addClass("editpiv");
				$("#editpiwv"+xpu).addClass("editpivv");
				$("#city"+xpu).removeClass("editpi");
				$("#city"+xpu).addClass("editpi2");
				$("#removeedit"+xpu).css("display","block");
				$("#stateedit"+xpu).val("1");
				$("#loc"+xpu).addClass("locr");
				$("#loc"+xpu).removeClass("loc");
}

$("#city"+xpu).val(v);
$("#cityv"+xpu).val(v);
$("#statec"+xpu).val(statec);
$("#countryc"+xpu).val(countryc);
$("#cityc"+xpu).val(cityc);

			$(function() {
		$("#city"+xpu).autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv"+xpu,
			search:function(){$(this).addClass("working");},
			open:function(){$(this).parents(".photo_container").eq(0).css("z-index","9999");
			$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			close:function(){$(this).parents(".photo_container").eq(0).css("z-index","2");},
			source: "/autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value;
	
				$("#editpiw"+xpu).addClass("editpiv");
	
				$("#editpiwv"+xpu).addClass("editpivv");
				$("#city"+xpu).removeClass("editpi");
				$("#city"+xpu).addClass("editpi2");
				$("#removeedit"+xpu).css("display","block");
				$("#stateedit"+xpu).val("1");
				$("#city"+xpu).val(as);
				$("#cityv"+xpu).val(as);
				$("#statec"+xpu).val(ui.item.statec);
				$("#countryc"+xpu).val(ui.item.countryc);
				$("#cityc"+xpu).val(ui.item.city);
				$(this).removeClass("working");
				$("#city"+xpu).blur();
				save_city_vals(xpu);
				return false;
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;text-align:left!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a style="font-weight:normal!important;">\'+item.value + \'</a>\' )
				.appendTo( ul );
		};
	});

';


$nphotos.='

this_slider($("#uioverlay").find(".brightness_slider:last"));
this_slider($("#uioverlay").find(".contrast_slider:last"));
var frame=res.frame;
var tilt_shift=res.tilt_shift;
var delem=".ui-state-defaultv:last";
var from_nf=false;
var brightness=res.brightness;
var total_brightness=res.total_brightness;
var contrast=res.contrast;
var total_contrast=res.total_contrast;
';

include("js/filters_load.php");

$nphotos.=$sechov;


$nphotos.='
$("#uploading"+xpu).remove();
		emulate_sort_update();
fix_sort_align();

var selected_album=res.selected_album;
var albumn=res.albumn;
var actual_pic=res.actual_pic;
var actual_pic2=res.actual_pic2;
var actual_pic3=res.actual_pic3;
var actual_pic4=res.actual_pic4;
var location=res.location;';

if(!isset($_POST['media'])){
$nphotos.='
		ruploadingvv(xpu);
	var write_only="write_only";';
}
else{
$nphotos.='
f_gu[xpu]=faces;
var write_only="write_only";';
}

if(isset($_POST['media'])){
$nphotos.='

if(ddesc!=""){
ddesc=str_replace("<p>","",ddesc);
ddesc=str_replace("</p>","",ddesc);
$("#says"+xpu).parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html(ddesc);
ddescv=str_replace(\'<b data-uidv="">\',\'\',ddescv);
ddescv=str_replace(\'</b>\',\'\',ddescv);
ddescv=str_replace(\'<p>\',\'\',ddescv);
ddescv=str_replace(\'</p>\',\'\',ddescv);
ddescv=str_replace(\'<br>\',\'\\n\',ddescv);
$("#says"+xpu).val(ddescv);
$(document).ready(function(){
$("#says"+xpu).trigger("keydown");
$("#says"+xpu).trigger("keyup");
});
}';
}

$nphotos.='

bqf(xpu,photoid,selected_album,actual_pic,actual_pic4,rwidthp,rheightp,write_only);

if(write_only!="complete"){
$("#pic_info").find("[name=sbid]").val(photoid);
$("#pic_info").find("[name=xpu]").val(xpu);';


if(!isset($_POST['media'])){
$nphotos.='
$("#detect_faces").click();
';
}
$nphotos.='
}
';

if(isset($_POST['media'])){
$nphotos.='
var mxpu=$("#xpu").val();
mxpu=parseInt(mxpu);
mxpu=mxpu+1;
$("#xpu").val(mxpu);
';
}
$nphotos.='
var nphoto="nphoto"+xpu;
var nphotov="#nphoto"+xpu;
}

function extraph(w){
$(w).removeClass("dcphogvc");

}
function extraph2(w){
var xpu=$(w).parents("li").eq(0).attr("data-xpu");
$("#editpiwv"+xpu).addClass("hidden_sb");
$(w).addClass("dcphogvc");
}
function displaypo(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
$("#selectop"+xpu).css("z-index","304");
$("#selectop"+xpu).css("visibility","visible");
$("#clickaf"+xpu).css("z-index","305");
$("#clickaf"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("z-index","305");
}
function pdisplaypo(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
$("#selectop"+xpu).css("z-index","304");
$("#selectop"+xpu).css("visibility","visible");
$("#clickaf"+xpu).css("z-index","305");
$("#clickaf"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("z-index","305");
pdoit();
}

function displaypov(xpu){
$("#selectopu"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("z-index","305");
$("#selectop"+xpu).removeClass("selectop");
$("#selectop"+xpu).addClass("selectopv");
$("#selectopu"+xpu).css("display","inline");
doitv();
}
function hidepov(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
var dval=$("#says"+xpu).attr("written");
if(dval==""){
$("#editpiw"+xpu).css("top","-25px");	
}
else{
$("#editpiw"+xpu).css("top","-25px");
}
$("#editpiwv"+xpu).removeClass("hidden_sb");
$("#selectopu"+xpu).css("visibility","hidden");
$("#selectopu"+xpu).css("z-index","-1");
$("#selectopu"+xpu).css("display","none");
$("#selectop"+xpu).removeClass("selectopv");
$("#selectop"+xpu).addClass("selectop");
doitvv();
}
function hidepo(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
var tocheck=$("#selectopu"+xpu).css("display");

if(tocheck=="none"){
$("#selectop"+xpu).css("z-index","-1");
$("#selectop"+xpu).css("visibility","hidden");
}
$("#clickaf"+xpu).css("z-index","-1");
$("#clickaf"+xpu).css("visibility","hidden");

}
function setb(){
var xpu=$("#prectot").val();
$("#maquina"+xpu).addClass("maquina_border");
}
function setbv(){
var xpu=$("#prectot").val();

}
function phidepo(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
var tocheck=$("#selectopu"+xpu).css("display");

if(tocheck=="none"){
$("#selectop"+xpu).css("z-index","-1");
$("#selectop"+xpu).css("visibility","hidden");
}
$("#clickaf"+xpu).css("z-index","-1");
$("#clickaf"+xpu).css("visibility","hidden");
pdoitv();
}
function displaypv(xpu){
var tocheck=$("#selectvo"+xpu).css("z-index");
if(tocheck=="-1"){

$("#selectvo"+xpu).css("z-index","1001");
$("#selectvo"+xpu).css("opacity","1");
}

doitv();
}
function displaypvv(xpu){
var tocheck=$("#selectvo"+xpu).css("z-index");
if(tocheck=="1001"){
$("#huioverlay").css("z-index","1001");
$("#selectvo"+xpu).css("z-index","-1");
$("#selectvo"+xpu).css("opacity","0");
}
$("#pnphotoc"+xpu).css("z-index","5");
$("#nphotocc").css("z-index","4");
doitvv();
}
function displaypm(xpu){
var activeso=$("#activeso").val();
if((activeso!="") && (activeso!=xpu)){
$("#selectop"+activeso).removeClass("selectopv");
$("#selectop"+activeso).addClass("selectop");
$("#selectopu"+activeso).css("display","none");
$("#selectopu"+activeso).css("z-index","-1");
$("#selectopu"+activeso).css("visibility","hidden");
hidepo(activeso);

var tocheck=$("#selectopu"+xpu).css("display");

if(tocheck=="none"){
$("#selectop"+xpu).removeClass("selectop");
$("#selectop"+xpu).addClass("selectopv");
$("#selectopu"+xpu).css("z-index","305");
$("#selectopu"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("display","inline");

$("#activeso").val(xpu);
}
else{
$("#selectop"+xpu).removeClass("selectopv");
$("#selectop"+xpu).addClass("selectop");
$("#selectopu"+xpu).css("display","none");
$("#selectopu"+xpu).css("z-index","-1");
$("#selectopu"+xpu).css("visibility","hidden");
$("#activeso").val("");
}

	}
else{
var tocheck=$("#selectopu"+xpu).css("display");

if(tocheck=="none"){
$("#selectop"+xpu).removeClass("selectop");
$("#selectop"+xpu).addClass("selectopv");
$("#selectopu"+xpu).css("z-index","305");
$("#selectopu"+xpu).css("visibility","visible");
$("#selectopu"+xpu).css("display","inline");

$("#activeso").val(xpu);
}
else{
$("#selectop"+xpu).removeClass("selectopv");
$("#selectop"+xpu).addClass("selectop");
$("#selectopu"+xpu).css("display","none");
$("#selectopu"+xpu).css("z-index","-1");
$("#selectopu"+xpu).css("visibility","hidden");
$("#activeso").val("");
}
}
}
function clears(xpu){
$("#city"+xpu).css("visibility","hidden");
$("#city"+xpu).css("z-index","2");
}
function changepd(xpu,photoid){
if(xpu!==undefined){
var tocheck=$("#says"+xpu).val();
}
else{
var tocheck=$("#says").val();
}
if(photoid===undefined){
var photoid=$("#cphotoid").val();
}
tocheck=$.trim(tocheck);
if(tocheck=="Say something about this photo..."){tocheck="";}
var selected_album=$("#selected_album").val();

var w=$("#says"+xpu).parents(".highlighter_wrapper").eq(0);
var tocheck=$(w).find(".highlighter").find(".highlighterContent").html();
tocheck=$.trim(tocheck);
if(tocheck=="Say something about this photo..."){tocheck="";}

$.ajax({
	type: "POST",
	url: "/changepd.php",
	data: { photoid : photoid, desc : tocheck, selected_album : selected_album }}).done(function(response){

    });
}
function alerta(xpu){
}
function updatexpu(xpu){
$("#xpunt").val(xpu);
}
function makealbcover(photoid,yk){
var selected_album=$("#selected_album").val();
	$.ajax({
	async: "false",
	type: "POST",
	url: "/makealbcover.php",
	data: { photoid : photoid, selected_album : selected_album },
	success: function(response) {
		$(".itema2").addClass("itema");
		$(".itema2").removeClass("itema2");
		$("#albcoverl"+yk).removeClass("itema");
		$("#albcoverl"+yk).addClass("itema2");
	}
});
}
</script>
<input type="hidden" id="pxpu">
<input type="hidden" id="axr">
<input type="hidden" id="activeso">
<input type="hidden" id="xpunt">
<script type="text/javascript">
$("#activeso").val("");
	function showwp(xpu){
$("#clicktt"+xpu).css("visibility","hidden");
$("#clicktt"+xpu).css("z-index","4");
$("#currentp"+xpu).css("visibility","hidden");
$("#currentp"+xpu).css("z-index","3");
$("#says"+xpu).css("visibility","visible");
$("#says"+xpu).css("z-index","5");
$("#city"+xpu).css("visibility","visible");
$("#city"+xpu).css("z-index","5");
$("#city"+xpu).focus();
}
function clearww(xpu){
var tocheck=$("#city"+xpu).val();
tocheck=$.trim(tocheck);
if(tocheck=="Where was this?"){$("#city"+xpu).val(""); $("#city"+xpu).css("color","#333333");}
}
function clearwwv(xpu){
var tocheck=$("#city"+xpu).val();
tocheck=$.trim(tocheck);
if(tocheck==""){$("#city"+xpu).css("color","gray"); $("#city"+xpu).val("Where was this?");}
}
function clearalb(){
$("#ralbum_title").css("border-color","rgb(189,199,216)");
var tocheck=$("#ralbum_title").val();
tocheck=$.trim(tocheck);
if(tocheck=="Untitled Album" || tocheck=="Untitled Board"){}
}

function clearalbv(){
$("#ralbum_title").css("border-color","rgb(255,255,255)");
var tocheck=$("#ralbum_title").val();
tocheck=$.trim(tocheck);
if(tocheck==""){}
}

function changealbumtitle(){
var album_title=$("#ralbum_title").val();
album_title=$.trim(album_title);
if(album_title==""){
if(pinboard){
album_title="Untitled Board";
}else{
album_title="Untitled Album";
}
}
var selected_album=$("#selected_album").val();
$.ajax({
	type: "POST",
	url: "/add_photos2.php",
	data: { albumid2 : album_title, selected_album : selected_album },
	success: function(response) {donemedia=true;
	}
});


}

function clearalbd(){
$("#album_desc").css("border-color","rgb(189,199,216)");
}

function clearalbdv(){
$("#album_desc").css("border-color","rgb(255,255,255)");
}

function changealbumdesc(){
var album_desc=$("#album_desc").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html();
album_desc=$.trim(album_desc);
var selected_album=$("#selected_album").val();
$.ajax({
	type: "POST",
	url: "/changealbumdesc.php",
	data: { album_desc : album_desc, selected_album : selected_album },
	success: function(response) {donemediav=true;
	}
});


}


function changeplv(xpu,photoid,e){

var tocheck=$("#city"+xpu).val();
tocheck=$.trim(tocheck);
if(tocheck=="Where was this?"){tocheck="";}
var selected_album=$("#selected_album").val();
var location=$("#location").val();
$.ajax({
	type: "POST",
	url: "/changeplv.php",
	data: { selected_album : selected_album, location : tocheck, photoid : photoid},
	success: function(response) {
if(response.length>0){
$("#loc"+xpu).addClass("locr");
$("#loc"+xpu).removeClass("loc");
}
else if(location!=""){$("#loc"+xpu).addClass("locv"); $("#loc"+xpu).removeClass("loc");}
else{$("#loc"+xpu).addClass("loc"); $("#loc"+xpu).removeClass("locv"); $("#loc"+xpu).removeClass("locr");}
}
});

}
function changeplocation(){
var tocheck=$("#city300000").val();
tocheck=$.trim(tocheck);
if(tocheck=="Where were these taken?"){tocheck="";}

$("#location").val(tocheck);
var selected_album=$("#selected_album").val();

$.ajax({
	type: "POST",
	url: "/changepl.php",
	data: { selected_album : selected_album, location : tocheck},
	success: function(response) {
if(response.length>0){
$(".loc").addClass("locv");
$(".loc").removeClass("loc");
}
else{$(".locv").addClass("loc"); $(".locv").removeClass("locv");}
}
});

}
function clearop(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
$("#clickaf"+xpu).css("z-index","-1");
$("#clickaf"+xpu).css("visibility","hidden");
$("#clickaf"+xpu).css("display","none");
$("#clickaf"+xpu).css("opacity","0");
$("#tagoverlay").css("z-index","10");
}
function clearopv(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
$("#selectop"+xpu).css("opacity","0");
$("#selectop"+xpu).css("z-index","-1");
$("#selectop"+xpu).css("visibility","hidden");
$("#selectop"+xpu).css("display","none");
}
function showopv(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
$("#selectop"+xpu).css("opacity","1");
$("#selectop"+xpu).css("z-index","304");
$("#selectop"+xpu).css("visibility","hidden");
$("#selectop"+xpu).css("display","inline");
}
function showopvv(xpu){
if(xpu===undefined){var xpu=$("#prectot").val();}
$("#selectop"+xpu).css("opacity","1");
$("#selectop"+xpu).css("z-index","-1");
$("#selectop"+xpu).css("visibility","hidden");
$("#selectop"+xpu).css("display","inline");
}
</script>

<input type="hidden" value="0" id="xpu" name="xpu">

<script type="text/javascript">
xpuo=0;';


$nphotos.='
$("#xpu").val("'.$xg.'");
</script>

<input type="hidden" id="thephoto">
<input type="hidden" id="thephotol">
<input type="hidden" id="thephotom">
<input type="hidden" id="thetable" value="'.$uidv.'">

<script type="text/javascript">
$("#thephoto").val("");
$("#thephotom").val("");
$("#thephotol").val("");
</script>

<div id="updateu"></div>
<input type="hidden" id="wwidthp">
<input type="hidden" id="wheightp">';

if(!isset($_POST['media'])){$uioverlayn='';}
else{$uioverlayn='v';}

if($pinboard=="1"){
    $dtext='You\'ve already uploaded some photos. Do you want to cancel and delete these photos?';
    $dtextv='Yes, Delete Photos';
}else{
    $dtext='You\'ve already uploaded some pins. Do you want to cancel and delete these pins?';
    $dtextv='Yes, Delete Pins';
}

$nphotos.='
<div style="position:relative;">
<div class="filters_edit uioverlay'.$uioverlayn.'" id="uioverlay" data-from_uploader="photo_uploader" style="z-index:-1;">

<div id="pre_pop_container" class="pre_pop_container" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv">

<div class="pop_container3" id="pop_containervvo" style="height:123px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo">Cancel upload?</div>
<div class="div_dialog_body3" id="div_dialog_bodyvo" style="height:26px;">
'.$dtext.'


</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footerv"><label class="fsl uiButton uiButtonConfirm mrs" onclick="del_real();"><input type="button" value="'.$dtextv.'" class="uiButtonText"></label><label class="fsl uiButton" onclick="approve_keep();"><input type="button" value="No, Continue Upload" class="uiButtonText"></label></div></div></div></div>

</div>

';

if(isset($_POST['media'])){
$mt='0';
$mtv='margin-top:-18px;padding-top:10px;';
$pt1='45';
$pt2='20';
$pb='0';
$ml='-10';
$hb='border-bottom:1px solid;border-color: -moz-use-text-color -moz-use-text-color rgb(221, 221, 221);box-shadow:0px 1px 0px rgba(0, 0, 0, 0.05);height:73px;width:983px;';
$bs='box-shadow:none;';
}
else{$mt='41'; $mtv=''; $pt1='35'; $pt2='10'; $pb='35'; $ml='-1'; $hb='border:1px solid rgb(204,204,204);border-color:rgb(196,205,224) rgb(196,205,224) rgba(0,01,0,0.1);border-radius:3px 3px 0pt 0pt;height:67px;width:967px;'; $bs='box-shadow:0pt 0pt 1px rgba(0, 0, 0, 0.25), 0pt 1px 5px 3px rgba(0, 0, 0, 0.05), 0pt 5px 4px -3px rgba(0, 0, 0, 0.06);';}

$nphotos.='
<div class="uioverlayi" style="'.$bs.'width:968px;margin:0 auto;padding:0;position:relative;left:0px;padding-bottom:'.$pb.'px;background:none repeat scroll 0% 0% rgb(255, 255, 255);">

<div style="width:966px;padding:0;margin-top:'.$mt.'px;top:0px;position:fixed;padding-left:0px;" id="phuioverlay">';


if(!isset($_POST['media'])){
$dstyle="position:absolute;";
}
else{
$dstyle="position:fixed;";
}

$nphotos.='
<div style="'.$dstyle.'background:#ffffff;z-index:1001;margin-left:'.$ml.'px;opacity:0;padding-left:1px;'.$mtv.$hb.'"  id="huioverlay">


<input type="text" class="albti dcphmgc" placeholder="" onfocus="clearalb();" onblur="clearalbv();" id="ralbum_title" style="width:320px;position:relative;margin-top:8px;margin-left:9px;">


<div style="position:absolute;left:10px;top:'.$pt1.'px;">
<div class="highlighter_wrapper" style="position:relative;height:51px;"><div class="highlighter" style="padding:0;position:absolute;width:320px;overflow:hidden;max-height:21px;padding-top:1px;"><div style="width:auto;min-height:23px;"><span class="highlighterContent" style="max-width:100%;vertical-align:top;display:inline-block;position:relative;top:3px;color:transparent;font-size:11px!important;padding:0 4px;line-height:15px!important;"></span><div class="highlighterAuxContent" style="vertical-align:top;display:inline-block;position:relative;"><div class="metadataFragment"></div></div></div></div><div style="background: none repeat scroll 0% 0% transparent;height:auto;border:0px none;" class="uiTypeahead composerTypeahead mentionsTypeahead"><div style="padding:0px;border:0px none;" class="step_autocomplete"><div style="overflow:hidden;cursor:default;"><textarea style="height:23px;cursor:text;visibility:visible;z-index:5;display:block;position:relative;width:320px;background-color:transparent;resize:none;line-height:15px!important;" class="uiTextareaAutogrow input mentionsTextarea textInput albde dcphmgc to_highlighter" title="Add details about this album..." placeholder="" autocomplete="off" id="album_desc" onfocus="clearalbd();" onblur="clearalbdv();"></textarea></div></div><div><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;line-height:13px!important;" class="autocomplete_findme inputtext dcphlgc displaynoneimportant hidden_sb" data-ac_enable="wall_uploaderdv30003" data-ac_liwidth="318" data-ac_inputw="280" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_custom_f="add_to_highlighter" data-ac_placeholder="Who where you with?" data-ac_position="fixed" data-ac_custom_ul=\'$(this).css("margin-left","-1px"); $(this).css("margin-top","-14px");\'></div><input type="hidden" name="descriptionv" autocomplete="off"></div></div></div>
</div>

<script type="text/javascript">
$("#album_desc").bind("keyup",to_highlighter_keyup);
$("#album_desc").bind("scroll",keep_scroll_to_highlighter);
$("#album_desc").bind("keyup",keep_scroll_to_highlighter);
</script>

';


$nphotos.='
<script type="text/javascript">
if(pinboard){
var dtext="Untitled Board";
var dtextv="Say something about this board...";
}else{
var dtext="Untitled Album";
var dtextv="Say something about this album...";
}
$("#album_desc").attr("placeholder",dtextv);
$("#ralbum_title").attr("placeholder",dtext);
';
if(!isset($_POST['media'])){
    $nphotos.='$("#ralbum_title").blur(function(){
changealbumtitle();
});
$("#album_desc").blur(function(){
changealbumdesc();
});';
}
$nphotos.='</script>
';




if(isset($ralbum)){
$albumn=$ralbumv;
}
else{
    if($pinboard=="1"){
        $albumn='Untitled Album';
    }else{
        $albumn='Untitled Board';
    }
}

if(!isset($ralbumv) || isset($ralbumv) && $ralbumv!="Wall Photos" && $ralbumv!="Wall Pins"){
    $nolocation="t";
}

if(isset($_POST['media'])){

$nphotos.='
<label id="donemedia" class="uiButton uiButtonConfirm" style="float:right;margin-top:20px;position:relative;margin-right:13px;"><input type="button" value="Done"></label>
';


$nphotos.='
<script type="text/javascript">
';

if($ralbumv=="Wall Photos" || $ralbumv=="Wall Pins"){
$nphotos.='
$("#ralbum_title").css("background","#ffffff");
$("#ralbum_title").attr("disabled",true);
';
}

$nphotos.='

$("#album_desc").addClass("permanent_border");

$("#iuploadingv").css("width","100%");

function del_alb_ajax_end(){
window.location=\'/'.$un.'/photos_albums\';
}


function winlocv(){

if(donemedia && donemediav){';

if($pinboard==1){
    $nphotos.='window.location="/'.$un.'/photos?album='.$ralbum.'";';
}else{
    $nphotos.='window.location="/'.$un.'/pins?board='.$ralbum.'";';   
}
$nphotos.='
}
else{
setTimeout("winlocv()",20);
}


}

$("#donemedia").click(function(){
changealbumtitle();
changealbumdesc();

winlocv();
});

//$("#delcvv").css("opacity","0");


';

$nphotos.="</script>";


if($albumn!="Wall Photos" && $albumn!="Wall Pins"){
$uidv=$uid;

$albumn=$albumn;

$ltypev="albums";
$uid_album_edit="t";
$peditablev="t";

$sbid=$albumid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$nphotos.='<ul class="uiList inlineBlock" style="position:relative;top:0px;margin-top:20px;float:right;margin-right:20px;">';


$privacy_configuration="big";
$privacy_source="puv";  //instead of pu, puv

$album_edit="t";
include("buttons/privacy_button.php");
$nphotos.=$button;
$nphotos.='</ul>';
unset($album_edit);
}

$nphotos.='
<div class="uiButton displaydialog" data-d_title2="Processing Your Request" data-d_okay="Delete Album" data-d_cancel="Cancel" data-d_width="447" data-d_title="Delete Album" data-d_overlay="white_create" data-d_okay_function="custom" data-d_cancel_function="close_dialog_f" data-d_leave_loading="show_loading_timeout" data-d_okay_function_custom="fjax" data-d_okay_a_fade="t" data-d_okay_function_custom2="rewrite_dialog" data-d_fjax="/delete/del_album.php?t=t&alb='.$ralbum.'" data-a_custom_f="del_alb_ajax_end" id="del_al_t" style="position:relative;margin-top:20px;float:right;padding-top:3px;padding-bottom:3px;padding-left:4px;padding-right:4px;margin-right:10px;" data-t_text="Delete Album" data-t_position="bottom" data-t_bottomright="t"><div class="delcv"></div></div><div class="dialog_msgs">Are you sure you want to delete '.$ralbumv.'?</div><div class="dialog_msgs">This will just take a moment</div>';




if($pinboard==1){
    $dtext='Add Photos';
}else{
    $dtext='Add Pins';
}

if($ralbumv!="Wall Photos" && $ralbumv!="Wall Pins"){
$nphotos.='
<div id="addphotosbt" style="margin-top:20px;float:right;position:relative;margin-right:10px;"><div class="uiButton addphotos_caller" style="padding-left:19px;padding-top:2px;padding-bottom:5px;"><div style="position:absolute;left:7px;bottom:3px;display:inline;" class="cruz"></div><div class="addmorep2">'.$dtext.'</div></div></div>';
}

}

if(isset($_GET['a'])){
    $albumid=$_GET['a'];   
}


if(isset($_POST['media'])){
$dstyle="margin-right:10px;width:201px;";
}
else{
$dstyle="margin-right:50px;width:278px;";
}

if(isset($nolocation)){
$nphotos.='<div id="editpiw300000" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;top:-13px;margin-top:20px;margin-right:12px;float:right;"><div id="editpiwv300000" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;height:22px;top:20px;"><input type="text" style="padding-right:4px;margin-top:20px;position:relative;top:-20px;float:right;width:270px!important;padding-left:20px;" id="city300000" class="location dcphlgc" title="Where were these taken?" placeholder="Where were these taken?" onblur="changeplocation();"><label id="removeedit300000" class="removeedit" style="display:none;z-index:10;" title="Remove" onclick="swapc(1,300000);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label></div></div><input autocomplete="off" type="hidden" id="statec300000"><input autocomplete="off" type="hidden" id="countryc300000"><input autocomplete="off" type="hidden" id="cityc300000"><input autocomplete="off" type="hidden" id="stateedit300000"><input autocomplete="off" type="hidden" id="cityv300000">';

$statec="";
$countryc="";
$cityc="";
$v="";

if(isset($albumid)){
$result=mysql_query("SELECT * FROM albums WHERE sbid='$albumid'");
while($ms=mysql_fetch_array($result)){
$sbid=$ms['sbid'];
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$staten=$m['staten'];	
}
$r=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$countryn=$m['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}
}

mysql_select_db("registered");

$nphotos.='<script type="text/javascript">';

$nphotos.='

var cxpu=300000;

var v="'.$v.'";
var cityc="'.$cityc.'";
var countryc="'.$countryc.'";
var statec="'.$statec.'";

if(v!=""){
				$("#editpiw"+cxpu).addClass("editpiv");
				$("#editpiwv"+cxpu).addClass("editpivv");
				$("#city"+cxpu).removeClass("editpi");
				$("#city"+cxpu).addClass("editpi2");
				$("#removeedit"+cxpu).css("display","block");
				$("#stateedit"+cxpu).val("1");
				$("#loc"+cxpu).addClass("locr");
				$("#loc"+cxpu).removeClass("loc");
}

$("#city"+cxpu).val(v);
$("#cityv"+cxpu).val(v);
$("#statec"+cxpu).val(statec);
$("#countryc"+cxpu).val(countryc);
$("#cityc"+cxpu).val(cityc);

			$(function() {
		$("#city"+cxpu).autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv"+cxpu,
			search:function(){$(this).addClass("working");},
			open:function(){$(this).parents(".photo_container").eq(0).css("z-index","9999");
			$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			close:function(){$(this).parents(".photo_container").eq(0).css("z-index","2");},
			source: "/autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value;
	
				$("#editpiw"+cxpu).addClass("editpiv");
	
				$("#editpiwv"+cxpu).addClass("editpivv");
				$("#city"+cxpu).removeClass("editpi");
				$("#city"+cxpu).addClass("editpi2");
				$("#removeedit"+cxpu).css("display","block");
				$("#stateedit"+cxpu).val("1");
				$("#city"+cxpu).val(as);
				$("#cityv"+cxpu).val(as);
				$("#statec"+cxpu).val(ui.item.statec);
				$("#countryc"+cxpu).val(ui.item.countryc);
				$("#cityc"+cxpu).val(ui.item.city);
				$(this).removeClass("working");
				$("#city"+cxpu).blur();
				save_city_vals(cxpu);
				return false;
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;text-align:left!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a style="font-weight:normal!important;">\'+item.value + \'</a>\' )
				.appendTo( ul );
		};
	});

</script>';
}

if(!isset($location) || $location==""){$location='';}


$nphotos.='
<script type="text/javascript">
$("#city300000").val("'.$location.'");
</script>

</div>

</div>';



$nphotos.='
<script type="text/javascript">
function adjust_uploader_header(){';
if(!isset($_POST['media'])){
$nphotos.='
var scrollt=$("#uioverlay").scrollTop;
var dscroll=37-scrollt;
if(dscroll>-37){
$("#huioverlay").css("top",dscroll+"px");
}
else{
$("#huioverlay").css("top","0px");
}
if(dscroll<-37){
$("#huioverlay").css("border-bottom-color","#b0bbd7");
}
else{
$("#huioverlay").css("border-bottom-color","rgb(204,204,204)");
}';
}
$nphotos.='
$("#huioverlay").css("left","");';
if(!isset($_POST['media'])){
$nphotos.='
$("b[data-t_id=adjust_uploader_header]").mouseenter();
';
}
$nphotos.='
}';


if(isset($_POST['media'])){
$nphotos.='

$(document).ready(function(){
function load_more_pics(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
y=y-260;
if(scrollt>y){
$("b[data-t_id=adjust_uploader_header]").mouseleave();
}';


if($browser=="mozilla"){
$nphotos.='
var scrollt=document.getElementById("upfrev").scrollTop;
var scrollb=document.getElementById("upfrev").scrollHeight;
';
}
else{
$nphotos.='
var scrollt=document.getElementById("body").scrollTop;
var scrollb=document.getElementById("body").scrollHeight;
';	
}

$nphotos.='
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
var bn=scrollb-scrollt;
var i3=bn-y;

if(i3==0){
$("b[data-t_id=load_more_pics]").mouseleave();

var starting=$("#xpu").val();
starting=parseInt(starting);
starting=starting;
var ending=starting+15;
var totalp=$("#totalp").html();
if(starting==totalp){return;}
else{
var load_more_picsa=$.ajax({
	type: "POST",
	url: "/more_pics.php",
	data: { alb : \''.$_GET['a'].'\', starting : starting, ending:ending }}).done(function(response){
if(response.length>0){alert(response);
$("#sortable").append(response);
$("b[data-t_id=load_more_pics]").mouseenter();
}
else{}
});
return;
}

}

$("b[data-t_id=load_more_pics]").mouseenter();

}


$("#main_divg").append(\'<b data-t_f="load_more_pics()" data-t_h="load_more_picsa" data-t_t="0" data-t_id="load_more_pics"></b>\');
$("b[data-t_id=load_more_pics]").click();
});
';
}
$nphotos.='

</script>';

if(!isset($_POST['media'])){
$pl1='-1';
$pnb='#d9d9d9';
}
else{$pl1='-10'; $pnb='#ffffff';}
$nphotos.='



<div style="width:968px;margin:0 auto;position:relative;padding:0;border:1px solid '.$pnb.';background:none repeat scroll 0% 0% rgb(255, 255, 255);margin-top:'.$mt.'px;position:relative;left:'.$pl1.'px;" id="pnphotos">



<script type="text/javascript">';

if(isset($ralbumv)){
    if($ralbumv=="Untitled Album" || $ralbumv=="Untitled Board"){
$nphotos.='$("#ralbum_title").val("");';
}
else{
$nphotos.='$("#ralbum_title").val("'.$ralbumv.'");';
}
}

if(!isset($ddesc)){
$ddesc='';
$ddescv='';
}
$nphotos.='
</script>';


$nphotos.='
<div class="hidden_sb" id="ddesc_holder">
'.$ddesc.'
</div>
<div class="hidden_sb" id="ddescv_holder">
'.$ddescv.'
</div>

<script type="text/javascript">
var descv=$("#ddescv_holder").html();
$("#album_desc").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html(descv);

var desc=$("#ddesc_holder").html();
desc=str_replace("<br>","\n",desc);
desc=str_replace("&nbsp;"," ",desc);
desc=str_replace("<p>","",desc);
desc=str_replace("</p>","",desc);
desc=str_replace(\'<b data-uidv="">\',"",desc);
desc=str_replace("</b>","",desc);
$("#album_desc").val(desc);

$(document).ready(function(){
$("#album_desc").trigger("keydown");
$("#album_desc").trigger("keyup");
});
</script>
';

if(!isset($_POST['media'])){
$od='inline-block';
$apt='';
}
else{$od='none'; $apt='padding-top:25px;';}
$nphotos.='
<div style="min-height:993px;margin:65px -15px 0pt;padding:10px 15px;'.$apt.'position:relative;" id="nphotos">
<div style="width:853px;margin:0 auto;padding:0;text-align:center;position:relative;display:'.$od.';">
';


$nphotos.='




<form enctype="multipart/form-data" action="/add_photos2.php" id="uphoto" name="uphoto" method="POST" class="fuploadvv" style="display:block">

<input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="10000000" />
<input type="hidden" name="selected_album" id="selected_album" value="" autocomplete="off">
<input type="hidden" name="location" id="location" value="">
<input type="hidden" name="submit2" id="submit2" value="">
<input type="hidden" name="xr" id="xr" value="">';

if(isset($_POST['fnf'])){}
else{
$nphotos.='';
}
$nphotos.='
</form>';


$nphotos.='



<script type="text/javascript">
$("#xr").val("");
$("#location").val("");
function addphotosc(){';
if(isset($ralbum)){
$nphotos.='$("#selected_album").val("'.$ralbum.'");';
}
else{
	$con=mysql_connect("localhost","root","xd22xd22");
	mysql_select_db("registered");
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND visibility!='d' AND pinboard='$pinboard' ORDER BY norder DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$norder=$m['norder']+1;
}


$uidv=$uid;
$sbid="";
$ltypev="options";

include("buttons/privacy_retrieve.php");

mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,cityc,statec,countryc,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp)
VALUES ('$uid','$albumn','','','d','','','','','$norder','$norder','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");

$albumid=mysql_insert_id();
$likeid=$albumid;
$ltype='album';
include("stories/like_insert.php");
include("stories/repin_insert.php");

$nphotos.='$("#selected_album").val("'.$albumid.'");

';
}
$nphotos.='
}
function photos(s){';
if(isset($_POST['media'])){
$nphotos.='';
}
$nphotos.='
addphotosc();
$("#main_divg").append(\'<b data-t_f="adjust_uploader_header()" data-t_h="" data-t_t="0" data-t_id="adjust_uploader_header"></b>\');
$("b[data-t_id=adjust_uploader_header]").click();
';
if(!isset($_POST['media'])){
$nphotos.='
$("body").attr("data-p_overflow_y",$("body").css("overflow-y"));
$("html").attr("data-p_overflow_y",$("html").css("overflow-y"));
$("body").css("overflow-y","hidden");
$("html").css("overflow-y","hidden");
';
$uiovz='450';
}
else{$uiovz='280';}
$nphotos.='
if(s){
$("#uioverlay").css("position","fixed");
}
$("#uioverlay").css("overflow-y","auto");
$("#uioverlay").scrollTop = 0;
$("#uioverlay").css("z-index","'.$uiovz.'");
$("#uioverlay").css("opacity","1");
$("#huioverlay").css("opacity","1");
var aleft=$("#pnphotos").offset().left;
aleft=parseInt(aleft);
aleft=aleft+3;
$("#phuioverlay").css("left",aleft+"px");
$.doTimeout(100,function(){
$("#phuioverlay").css("position","relative");
$("#phuioverlay").css("left","0");
});
 $("html, body").animate({ scrollTop: 0 }, "fast");
 ';
	if(!isset($_POST['media'])){
	$nphotos.='
	submitu(actual_input_file);';
	}
$nphotos.='
}
</script>
<input type="button" class="pupload" style="position:relative;top:'.$tofuploadv.'px;cursor:pointer;z-index:4;opacity:1;" id="photouploader">
<div style="color:rgb(170,170,170);font-size:11px;margin-top:20px;text-align:center;position:relative;bottom:-118px;" id="fuploader" class="fuploader">Trouble uploading photos? <a href="/add_photos.php">Try the basic uploader</a>.</div>
</div>







<script type="text/javascript">
function pdoit(){
var xpu=$("#prectot").val();

}
function pdoitv(){
var xpu=$("#prectot").val();
//$("#pnphotoc"+xpu).css("z-index","5");
$("#nphotocc").css("z-index","4");

}

function doitv(){

}

function doitvv(){

}

</script>


<div id="nphotosc" style="margin:0;margin-left:0px;padding:0;display:inline-block;position:relative;width:968px;">

<ul id="sortable" style="display:inline-block;margin:0;padding:0;position:relative;margin-left:22px;opacity:1;width:100%;">


</ul>

<ul style="display:none;position:absolute;padding:0;margin:0;list-style-type:none;margin-left:22px;" id="nphotoc">
<li class="ui-state-default" style="margin:0;margin-bottom:15px;padding:0;list-style-type:none;z-index:4;font-weight:normal;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;" id="nphotocc">
<div style="margin:0;margin-bottom:0px;padding:0;display:inline-block;position:absolute;"><div style="display:inline-block;width:288pxheight:288px;vertical-align:bottom;text-align:center;margin-left:0px;margin-top:0;margin-bottom:0;padding:0;border:1px solid;-moz-border-colors:none;-moz-border-image:none;border-color:transparent;position:relative;" id="nphotocv" onmouseover="displaypo();" onmouseout="hidepo();"><div style="position:absolute;width:288px;border:1px solid;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(59, 89, 152, 0.35);z-index:2;text-align:center;" id="maquina"></div><div style="position:relative;margin:0;padding:0;top:-1px;">


					<div class="jTagContainer" id="jTagContainer" style="display:inline-block;position:absolute;top:0;left:0;">

					<div style="position:absolute;z-index:1;border-width: 1px;border-style:solid;border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(59, 89, 152, 0.35);" id="jtagborder"></div>
					<div class="jTagArea" id="jTagArea" style="display:inline-block;z-index:10;">

					<div class="tagoverlay" id="tagoverlay" style="width:100%;height:100%;position:relative;z-index:10;display:inline-block;cursor:crosshair;" onmouseover="pdisplaypo();" onmouseout="phidepo()"></div><img src="/images/transparent.png" id="nphoto" style="cursor:crosshair;display:block;position:absolute;top:0px;left:0px;height:290px;width:290px;"><div class="jTagLabels"><div style="clear:both"></div></div>
</div></div>


</div></div></div>
</li>
</ul>

</div>

<input type="hidden" id="hiddeni">
<input type="hidden" id="swtc">
<script type="text/javascript">
$("#swtc").val("0");
</script>
<div id="rufus" style="display:none;"></div>
<div id="rufus2" style="display:none;"></div>
<input type="hidden" id="activew">

<input type="hidden" id="bsaved">

<input type="hidden" id="love" value="love">

<input type="hidden" id="sortable_start" >

<script type="text/javascript">
function strpos (haystack, needle, offset) {
	var i = (haystack + \'\').indexOf(needle, (offset || 0));
		return i === -1 ? false : i;
}



var imgOrder = "";


$(function() {
	$("#sortable").sortable({
	items: "> li:not(.imguploading)",
		placeholder: \'ui-state-highlight\',
		update: function(event, ui) {
	fix_sort_align();
	emulate_sort_update();

			imgorder = $("#sortable").sortable(\'toArray\').toString();
		imgorderl=imgorder.split(",");
		imgorderll=imgorderl.length-1;
		var selected_album=$("#selected_album").val();
		var fajax="";
		x=0;
		var y='.$xg.';
		while(x<=imgorderll){
			if((strpos(imgorderl[x],"uploading")!==false) || (strpos(imgorderl[x],"anerror")!==false) || (imgorderl[x]=="")){}
			else{
			var este=imgorderl[x];
			y=y+1;
			este=este.replace("pnphotoc","");
var actuale=$("#nphotoc"+este).attr("name");
			$("#nphotoc"+este).attr("name",y);
			fajax+=y+":"+actuale+"{}";
			}
			x++;
		}
//	  //alert(fajax);
		$.ajax({
	async: "false",
	type: "POST",
	url: "/rearrangep.php",
	data: { fajax : fajax, selected_album : selected_album },
	success: function(response) {
		$(".itema2").addClass("itema");
		$(".itema2").removeClass("itema2");
	}
});


		}, start: function(event,ui){
		var did=ui.item.attr("id");

		$(".ui-state-highlight").attr("id","sort_f_id");

		fix_sort_align();


	//	var mt=$("#sort_f_id").css("margin-top");

	//	$(".ui-sortable-helper").css("margin-top",mt);

		$("#sortable_start").val("t");
		var start_pos = ui.item.index();
				ui.item.data("start_pos", start_pos);

		$("#nphotoc").css("opacity","0");
		$("#swtc").val("1");
		var aid=ui.item.attr(\'id\');
		$(".ui-sortable-helper").css("position","relative");

//		$("#sortable").before($("#"+aid));

	},
	stop: function(event,ui){
	fix_sort_align();
		emulate_sort_update();
		$("#sortable_start").val("f");


		$("#swtc").val("0");
		var aid=ui.item.attr(\'id\');
		var aidv=aid.replace("pnphotoc","");
				var aid=ui.item.attr(\'id\');
				$("#nphotoc").css("opacity","1");

	$("#"+aid).css("position","relative");

	var xpu=$("#prectot").val();

if(xpu!==undefined){
var offseto=$("#sortable").position().left;
var offsetov=$("#pnphotoc"+xpu).position().left;
var offsetovv=offsetov-offseto;
offsetovv=offsetovv+8;
offsetovv=offsetovv+"px";
$("#nphotoc").css("left",offsetovv);

var offseto=$("#sortable").position().top;
var offsetov=$("#pnphotoc"+xpu).position().top;
var offsetovv=offsetov-offseto;

offsetovv=offsetovv+"px";
$("#nphotoc").css("top",offsetovv);
}

	},sort:function(event,ui){
fix_sort_align();
		var aid=ui.item.attr(\'id\');
					$("#sortable li").removeClass("clear green");

						$("#sortable li.x:not(.ui-sortable-helper)").addClass("y");

						$(".ui-state-highlight").addClass("y");


			var multiple=3;
			var ax=0;
			$("#sortable li.y").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}

			ax++;
			});

	},clone:"clone",tolerance:\'pointer\',appendTo: \'#sortable\',forcePlaceholderSize: true,cancel: \'.bottom_menu_photo,.ccarita,.imgerror,.imguploading,:input,button,.filters_selection_wrapper\'
	});



});

function fix_sort_align(){
var heights=new Array();
var sort_ids=new Array();

var ax=0;
var axv=1;

var multiple=3;

$("#sortable li:not(.imgerror,.imguploading,.ui-sortable-helper)").each(function(){
var dax=axv-2;
//segunda linea
var daxv=axv-1;
//primera linea

heights[ax]=$(this).innerHeight();
sort_ids[ax]=$(this).attr("id");

var remainder=axv % multiple;
var remainderv=dax % multiple;
var remaindervv=daxv % multiple;
if (remainder==0 || remainderv==0 || remaindervv==0){
var cloneh=new Array();
$(heights).each(function(k,v){
cloneh[k]=v;
});

var vv=cloneh.sort(function(a,b){return b-a});

$(heights).each(function(k,v){

var v=vv[0]-v;
var did=sort_ids[k];
if(did===undefined){}
if(did=="sort_f_id"){
	$(".ui-sortable-helper").css("margin-top",v+"px");
}
$("#"+did).css("margin-top",v+"px");

});

if(remainder==0){
heights=new Array();
ax=-1;
axv=0;
}
//reset once again to 1 counter..
}
ax++;
axv++;

});
}

function submitonEnterpt(evt){

var charCode = (evt.which) ? evt.which : event.keyCode;
var tocheck=$("#jTagLabel").val();
tocheck=$.trim(tocheck);
if(tocheck!=""){}
else{}
if((charCode == "13") && (tocheck=="")){return false;}
else if(charCode == "13"){
//alert(5); 
$(".jTagSaveBtn").click(); return false;
}
else{}

}


function clearlabel(){
var tocheck=$("#jTagLabel").val();
tocheck=$.trim(tocheck);
if((tocheck=="Type any name") || (tocheck=="")){$("#jTagLabel").val("");}
}

function clearlabelv(){
var tocheck=$("#jTagLabel").val();
tocheck=$.trim(tocheck);
if(tocheck==""){}
}

function setrid(id,cuidvjs){
var bsaved=$("#bsaved").val();
$("#tag"+bsaved).attr("name",id);
var e=cuidvjs;
if(e!=""){
var er=\'<span style="display:none;width:0;border:0;" id="otag\'+bsaved+\'" name="\'+e+\'"></span>\';
$("#tag"+bsaved).prepend(er);
}
}

function checkit(){
$("#love").val("nothing");
}
			$(document).ready(function(){
';

if(isset($_POST['media'])){
$uploader_vis='v';
}
else{
$uploader_vis='h';
}
$nphotos.="
var pin='.$pinboard.';
				$(\"#nphoto\").tag({
					canTag:true,
					canDelete:true,
					defaultWidth:50,
					defaultHeight:50,
					resizable:false,
					showTag: 'hover',
					autoComplete:
[
				{
					label: \"no friends yet to tag\",
					value: \"no friends yet to tag\",
				desc: \"no friends yet to tag\"
				},
				],
	save: function(width,height,top_pos,left,label,cuidvjs,thetable,thephotol,thephotom,thephoto,albumid,the_tag){".'
				var uploader_vis="'.$uploader_vis.'";'."	$.post(\"/ajax/tags/photo_uploader.php\",{'action':'save','width':width,'height':height,'top':top_pos,'left':left,'label':label,'cuidvjs':cuidvjs,'thetable':thetable,'thephotol':thephotol,'thephotom':thephotom,'thephoto':thephoto,'albumid':albumid,uploader_vis:uploader_vis,pin:pin},function(id){".'
					if(id=="e10{}"){
	var exists=$("#tag_full").length;
	if(exists==0){
		$("body").append(\'<div id="tag_full" class="displaydialog hidden_sb" data-d_overlay="white_create" data-d_title="Tag Error" data-d_okay="Close" data-d_okay_function="close_dialog"></div><div class="dialog_msgs">This photo contains the maximum amount of tags.</div>\');
	}
		$("#tag_full").click();
}'."else{
						setrid(id,cuidvjs);
						the_tag.setId(id);
}

});
				},
				remove: function(id,thetable,cuidvjs){".'
            			$.ajax({
	type: "POST",
	url: "/ajax/tags/photo_uploader.php",
	data: {action:\'delete\',id:id,thetable:thetable,cuidvjs:cuidvjs}}).done(function(){
});
				}
			});

			});

$("#love").val("");


	function emulate_sort_update(){

				$("#sortable li.x").removeClass("y");
						$("#sortable li.x").removeClass("clear green");


			var multiple=3;
			var ax=0;
			$("#sortable li.x").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}

			ax++;
			});

	}
</script>

<input type="hidden" id="prectot" value="">
<input type="hidden" id="cphotoid" value="">
<script type="text/javascript">
$("#prectot").val("");
$("#cphotoid").val("");

function renewv(xpu){
var prectot=xpu;
$("#clicktt"+prectot).css("visibility","hidden");
$("#says"+prectot).css("visibility","hidden");
$("#currentp"+prectot).css("visibility","visible");
$("#clicktt"+prectot).css("z-index","3");
$("#says"+prectot).css("z-index","4");
$("#currentp"+prectot).css("z-index","5");
}
function renew(xpu,f){
	var prectot=xpu;
	var pallt=$("#ctoteti"+xpu).val();
if((pallt!="") && (pallt!==undefined)){
var rompecocos="";
var allt=pallt.split(",");
var alltv=allt.length-1;
x=1;
while(x<=alltv){

rompecocos+=\'<div class="carita"><span title="\'+$("#tagvvv"+allt[x]).html()+\'">\'+$("#tagvvv"+allt[x]).html()+\'</span><div onclick="delo(\\\'\'+allt[x]+\'\\\',\'+xpu+\')" class="ccarita" title="Remove \'+$("#tagvvv"+allt[x]).html()+\'"></div></div>\';

x++;
}
$("#currentp"+xpu).html(rompecocos);
}

var ctotetia=$("#ctoteti"+xpu).val();
if((ctotetia!="") && (ctotetia!==undefined)){
var alleti=ctotetia.split(",");
var tlength=alleti.length-1;
var x=1;
while(x<=tlength){
$("#tag"+alleti[x]).css("display","block");
x++;
}


$("#clicktt"+prectot).css("visibility","hidden");
$("#says"+prectot).css("visibility","hidden");
$("#currentp"+prectot).css("visibility","visible");
$("#clicktt"+prectot).css("z-index","3");
$("#says"+prectot).css("z-index","4");
$("#currentp"+prectot).css("z-index","5");

}
else{
$("#clicktt"+prectot).css("visibility","hidden");
$("#currentp"+prectot).css("visibility","hidden");
$("#says"+prectot).css("visibility","visible");
$("#clicktt"+prectot).css("z-index","3");
$("#currentp"+prectot).css("z-index","4");
$("#says"+prectot).css("z-index","5");
}

}
function delo(xpu,xpuv){
$("#tagv"+xpu).click();
renew(xpuv);
}

$(document).on("mouseover",".x",function(){
$(".x").css("z-index","5");
$(this).css("z-index","6");
});

function ctot(xpu,thephotol,thephotom,thephoto,wwidthp,wheightp,photoid,wctot,e){
	$("#editpiwv"+xpu).addClass("hidden_sb");
	$(".x").css("z-index","5");
	$("#pnphotoc"+xpu).css("z-index","6");

var ss=$("#sortable_start").val();
if(ss=="t"){return false;}
$("#maquina"+xpu).after($("#jTagContainer"));
if(wctot=="top"){
$(".jTagSaveClose").click();
}
var swtc=$("#swtc").val();
if(swtc=="1"){return;}
$("#city"+xpu).css("visibility","hidden");
$("#city"+xpu).css("z-index","2");
$("#clickaf"+xpu).css("z-index","305");
$("#nphoto").src="";



$("#nphotoc").css("display","none");
$("#nphoto").css("display","none");

var offseto=$("#sortable").position().left;
var offsetov=$("#pnphotoc"+xpu).position().left;
var offsetovv=offsetov-offseto;
offsetovv=offsetovv+8;
offsetovv=offsetovv+"px";
$("#nphotoc").css("left",offsetovv);

var offseto=$("#sortable").position().top;
var offsetov=$("#pnphotoc"+xpu).position().top;
var offsetovv=offsetov-offseto;

offsetovv=offsetovv+"px";
$("#nphotoc").css("top",offsetovv);


$("#cphotoid").val(photoid);
var prectot=$("#prectot").val();

if(prectot!=""){

$("#nphotoc"+prectot).css("visibility","visible");
var ctotetip=$("#ctoteti"+prectot).val();

if(ctotetip!="" && ctotetip!==undefined){
var alleti=ctotetip.split(",");
var tlength=alleti.length-1;
var x=1;
while(x<=tlength){
$("#tag"+alleti[x]).css("display","none");
x++;
}

}

$("#city"+prectot).css("visibility","hidden");
$("#city"+prectot).css("z-index","2");
}


$("#prectot").val(xpu);
var prectotv=prectot;

var prectot=xpu;
var pallt=$("#ctoteti"+xpu).val();
if(pallt!=""){
var rompecocos="";
var allt=pallt.split(",");
var alltv=allt.length-1;
x=1;
while(x<=alltv){

rompecocos+=\'<div class="carita"><span title="\'+$("#tagvvv"+allt[x]).html()+\'">\'+$("#tagvvv"+allt[x]).html()+\'</span><div onclick="delo(\\\'\'+allt[x]+\'\\\',\'+xpu+\')" class="ccarita" title="Remove \'+$("#tagvvv"+allt[x]).html()+\'"></div></div>\';

x++;
}
$("#currentp"+xpu).html(rompecocos);
}

var ctotetia=$("#ctoteti"+xpu).val();
if(ctotetia!=""){
var alleti=ctotetia.split(",");
var tlength=alleti.length-1;
var x=1;
while(x<=tlength){
$("#tag"+alleti[x]).css("display","block");
x++;
}

if(wctot=="bottom"){
$("#says"+prectot).css("visibility","hidden");
$("#clicktt"+prectot).css("visibility","hidden");
$("#currentp"+prectot).css("visibility","visible");
$("#clicktt"+prectot).css("z-index","3");
$("#says"+prectot).css("z-index","4");
$("#currentp"+prectot).css("z-index","5");

}

}
else{
if(wctot=="bottom"){
$("#says"+prectot).css("visibility","hidden");
$("#currentp"+prectot).css("visibility","hidden");
$("#clicktt"+prectot).css("visibility","visible");
$("#says"+prectot).css("z-index","3");
$("#currentp"+prectot).css("z-index","4");
$("#clicktt"+prectot).css("z-index","5");


}
else{
$("#clicktt"+prectot).css("visibility","hidden");
$("#clicktt"+prectot).css("z-index","3");
$("#currentp"+prectot).css("visibility","hidden");
$("#says"+prectot).css("visibility","visible");
$("#currentp"+prectot).css("z-index","4");
$("#says"+prectot).css("z-index","5");


}

}


if((prectot!=prectotv) && (prectotv!="")){
$("#clicktt"+prectotv).css("visibility","hidden");
$("#clicktt"+prectotv).css("z-index","3");
$("#currentp"+prectotv).css("visibility","hidden");
$("#says"+prectotv).css("visibility","visible");
$("#currentp"+prectotv).css("z-index","4");
$("#says"+prectotv).css("z-index","5");
}

$("#wwidthp").val(wwidthp);
$("#wheightp").val(wheightp);

$("#thephotol").val(thephotol);
$("#thephotom").val(thephotom);

$("#thephoto").val(thephoto);
$(".jTagSaveClose").click();
var activew=$("#activew").val();
$("#nphotoc"+activew).css("display","inline-block");
$("#activew").val(xpu);

$("#nphoto").src=$("#nphoto"+xpu).src;

var widthtg=$("#nphoto"+xpu).css("width");
var heighttg=$("#nphoto"+xpu).css("height");
var heighttgv=parseInt(heighttg);
var heighttgvv=heighttgv-2;
var widthtgv=parseInt(widthtg);
var widthtgvv=290-widthtgv;
var aposlv=$("#pnphotoc"+xpu).offset().left;
var aposl=$("#nphoto"+xpu).offset().left;
var aposlvv=aposl-aposlv;
var lefttg=aposlvv-9;
lefttg=lefttg+"px";

$("#jTagContainer").css("display","inline-block");
$("#jTagContainer").css("width",widthtg);

var widthtgv=widthtg.replace("px");
widthtgv=parseInt(widthtgv);
widthtgv=widthtgv/2;
widthtgv=widthtgv+1;

var ole=$("#mphoto"+xpu).offset().left;
var olev=$("#maquina"+xpu).offset().left;

var olevv=ole-olev;


$("#jTagContainer").css("left",olevv+"px");
$("#jTagContainer").css("top","0");

var bdw=topxv(widthtg,"s",2);
var bdh=topxv(heighttg,"s",2);
$("#jtagborder").css("width",bdw);
$("#jtagborder").css("height",bdh);

var bdwv=$("#maquina"+xpu).css("width");
if(bdw!=bdwv){
$("#jtagborder").css("border-style","solid none");
}
else{
$("#jtagborder").css("border-style","solid");
}

$("#jTagArea").css("width",widthtg);
$("#nphoto").css("width",widthtg);
$("#nphoto").css("height",heighttg);
$("#jTagArea").css("height",heighttg);

var pash=$("#maquina"+xpu).css("height");
$("#maquina").css("height",pash);
var pashv=$("#pnphotoc"+xpu).css("margin-top");
pashv=pashv.replace("px","");
pashv=parseInt(pashv);
pashv=pashv-1;
pashv=pashv+"px";
$("#maquina").css("margin-top",pashv);


$("#nphotocv").css("left",lefttg);
$("#maquina").css("margin-left","-"+lefttg);

$("#nphotocv").css("height",heighttgvv);

$("#nphotoc"+xpu).css("visibility","visible");
$("#nphotoc").css("display","inline-block");
$("#nphoto").css("display","inline-block");

if(wctot!="bottom"){
						clearop();
										hidepov();
										clearopv();
					var obj=$("#nphoto");

					obj.showDrag(e);

$(".recognitionBox").unbind("mouseover",recog_over);
$(".recognitionBox").unbind("mouseout",recog_out);

$(".recognitionBox").bind("mouseover",recog_over);
$(".recognitionBox").bind("mouseout",recog_out);

$(".recognitionBox").addClass("recog_hidden");
}
else{
$(".recognitionBox").unbind("mouseover",recog_over);
$(".recognitionBox").unbind("mouseout",recog_out);

$(".recognitionBox").bind("mouseover",recog_over);
$(".recognitionBox").bind("mouseout",recog_out);

$("#pnphotoc"+xpu).find(".recognitionBox").unbind("mouseover",recog_over);
$("#pnphotoc"+xpu).find(".recognitionBox").unbind("mouseout",recog_out);

$(".recognitionBox").addClass("recog_hidden");
$("#pnphotoc"+xpu).find(".recognitionBox").removeClass("recog_hidden");
}
}
</script>

<input type="hidden" id="posi">
<input type="hidden" id="iuploading" value="0">

</div>

<div class="nphotosb" id="nphotosb" style="z-index:11;width:928px;margin-left:-1px;display:'.$od.';">

<label style="position:relative;float:left;display:block;">
<input type="button" value="" class="morephotosu" style="z-index:601;color:#333333;font-family:\'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;display:inline-block;'.$paupload.'" id="morephotosu" disabled="true">
<i class="massign" id="massign" style="margin:0;padding:0;position:absolute;"></i>
</label>

<script type="text/javascript">
if(pinboard){
var dtext="Add More Pins";
}else{
var dtext="Add More Photos";
}
$("#morephotosu").val(dtext);
</script>





<div class="mlm uiInputLabel clearfix" style="display:inline-block;position:relative;top:2px;" id="hqv" data-t_text="Store large images (slower)" data-t_topleft="t" data-t_fixed="t">


<input type="checkbox" name="hquality" id="hquality" class="uiInputLabelCheckbox"><label for="hquality" style="cursor:pointer;position:relative;bottom:1px;" class="labeld">High Quality</label>
</div>

<div style="width:120px;padding:0;padding-top:5px;padding-bottom:5px;text-align:center;border-collapse:collapse;border-spacing:0;display:none;margin-left:88px;" id="progressbars">

<div style="background:none repeat scroll 0% 0% #ffffff;border:1px solid;-moz-border-colors:none;-moz-border-image:none;border-color:rgb(164,164,164) rgb(187,187,187) rgb(213,213,213);text--align:center;border-collapse:collapse;border-spacing:0;" data-t_text="Upload Complete" data-t_topleft="t" data-t_fixed="t" data-t_offset="6">
<div style="width:0%;border-right:1px solid #3b5998;border-width:1px 0pt 1px 1px;height:8px;background:none repeat scroll 0% 0% #6d84b4;border-style:solid;border-color:#3b5998;-moz-border-colors:none;-moz-border-image:none;overflow:hidden;position:relative;margin:-1px;text-align:center;border-collaspe:collapse;border-spacing:0;" id="iuploadingv">
</div>

</div>


</div>



<script type="text/javascript">
function winlocc(){
window.location=window.location;
}
function locreload(){
location.reload(true);
}
function send_to_album(response,org_elem){//alert(response);
var c=retcount();';
$uti=sb_user($uid);
if($pinboard==1){
    $dhref='/'.$uti['username'].'/photos?album='.$albumid;
}else{
    $dhref='/'.$uti['username'].'/pins?board='.$albumid;
}
if($_POST['switch']==1){ //it is loading from media set edit therefore we'll load back right there
$nphotos.='
var wl=window.location;
$("#main_divg").append(\'<a id="dalbum\'+c+\'" href="\'+wl+\'"></a>\');
';
}
else{ //we will take to the album no matter from where the add button was clicked on
    $uti=sb_user($uid);
$nphotos.='
$("#main_divg").append(\'<a id="dalbum\'+c+\'" href="'.$dhref.'"></a>\');
';
}
$nphotos.='
$("#dalbum"+c).click();
}

function save_photos(f){
	var photos_ids="";
	$("#sortable").find("li[data-sbid]").each(function(){
	photos_ids+=","+$(this).data("sbid");
	});
	$("#additional_uploader_save").find("input[name=photos_ids]").val(photos_ids);
	if(f=="f"){
	$(".postf").next().removeAttr("data-a_custom_f");
	}
	else{
	$(".postf").next().attr("data-a_custom_f","send_to_album");
	}
	$(".postf").next().click();
}
window.onbeforeunload=function(){
save_photos("f");
return;
}
function pfadeuioverlay(){
$("#pre_pop_container").css("opacity","1");
$("#pre_pop_container").css("display","inline-block");
}';

if(isset($_POST['from_media']) && $_POST['from_media']==2){
 //$dclass="npjax";   
    $dclass="";
    $nphotos.='var from_mediav=2;';
}else{
 $dclass="";   
 $nphotos.='var from_mediav=1;';
}

$nphotos.='
function fadeuioverlay(s){
if(s){
window.onbeforeunload=null;

$("body").css("overflow-y","");
$("html").css("overflow-y","");

var aleft=$("#pnphotos").offset().left;
aleft=parseInt(aleft);
aleft=aleft+3;
//$("#phuioverlay").css("left",aleft+"px");
//$.doTimeout(100,function(){
//$("#phuioverlay").css("position","relative");
//$("#phuioverlay").css("left","0");
//});

function dfader(){
var dhref=window.location;
$(".uioverlay").eq(0).append(\'<a href="\'+dhref+\'" class="hidden_sb '.$dclass.'" id="winloc_reload"></a>\');
$("#winloc_reload").click();
}

if(from_mediav==1){
$(".uioverlay").fadeOut("300",dfader);
}else{
$(".uioverlay").css("display","none");
dfader();
}

}
if(!s){
save_photos();
window.onbeforeunload=null;
}
}
function del_real(){';
if(isset($ralbum)){
$nphotos.='var delurl="/delete/del_album.php?p=t";';
}
else{
$nphotos.='var delurl="/delete/del_album.php?t=t";';
}
$nphotos.='

var astart="'.$xg.'";
var alb=$("#selected_album").val();
			$.ajax({
	type: "POST",
	url: delurl,
	data: {alb:alb,astart:astart}}).done(function(){
document.title=original_doc_title;
$("#pre_pop_container").css("display","none");
fadeuioverlay(\'s\');
});

}
function approve_keep(){
var dpop=$(".pre_pop_container");
$(dpop).each(function(){
if(from_mediav==1){
$(this).fadeOut("400",function(){});
}else{
$(this).css("display","none");
}
});
}
</script>
<div style="display:inline-block;padding:0;margin:0;position:absolute;cursor:pointer;" class="fuploaderv" id="fuploaderv" onclick="pfadeuioverlay();">Cancel</div>';


if(!isset($_POST['media'])){
$nphotos.='
<label class="uiButton uiButtonConfirm postf rfloat mls">
<input type="button" class="uiButtonText" id="photo_post" style="color:#ffffff;position:relative;float:right;" onclick="fadeuioverlay();" value="">
</label>
<div class="hidden_sb" fjax="/add_photos/save.php?sbid='.$albumid.'" data-a_custom_f="send_to_album" data-a_form="additional_uploader_save"></div>
<div id="additional_uploader_save" class="hidden_sb">
<input type="hidden" name="photos_ids" autocomplete="off">
</div>

<script type="text/javascript">
if(pinboard){
var dtext="Post Pins";
}else{
var dtext="Post Photos";
}
$("#photo_post").val(dtext);
</script>

';



$uidv=$uid;

$albumn=$albumn;

$ltypev="albums";
$uid_album_edit="t";
$peditablev="t";

$sbid=$albumid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$nphotos.='<ul class="uiList inlineBlock" style="position:relative;top:0px;float:right;">';


$privacy_configuration="big";
$privacy_source="pu";

$album_edit="t";
include("buttons/privacy_button.php");
$nphotos.=$button;
$nphotos.='</ul>';
unset($album_edit);

}



$nphotos.='
</div>

</div>


</div>
</div>

</div>

<script type="text/javascript">
$("#iuploading").val("0");
</script>
';
$nphotos.='
<div id="containerholder"></div>
<script type="text/javascript">
function remove_pic(xpu,photoid){
if(upload_active){
alert("Upload in progress. Please wait");
return false;
}
$("#selectopu"+xpu).css("display","none");
	$("#selectop"+xpu).removeClass("selectopv");
	$("#selectop"+xpu).addClass("selectop");
	$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="remove_picv(\'+xpu+\',\\\'\'+photoid+\'\\\');"><input type="button" value="Okay" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');

$("#delwhat").html("Photo");
$("#delwhat2").html("photo");
$("#pre_pop_container2").css("display","block");

}
function cancel_remove(){
$("#pre_pop_container2").fadeOut("slow");
}
function remove_picv(xpu,photoid){

	$("#nphotoc").css("display","none");
	var prectot=$("#prectot").val();
		$("#jTagContainer").css("display","none");

	if(prectot==xpu){
		$("#containerholder").after($("#jTagContainer"));
	}
	$("#jTagContainer").css("display","none");
	$( "#sortable" ).sortable( "option", "disabled", true );

$("#pre_pop_container2").css("display","none");
$("#pnphotoco"+xpu).css("display","inline-block");

var alb=$("#selected_album").val();
			$.ajax({
	type: "POST",
	url: "/delete/del_album.php?i=t",
	data: { alb : alb, photoid:photoid },
	success: function(response) {
$("#pnphotoc"+xpu).fadeOut("slow", function() {

$("#nphoto").css("display","none");

var oxpu=$("#nphotoc"+xpu).attr("name");

$("#pnphotoc"+xpu).remove();
$("#uploading"+xpu).remove();
fix_sort_align();
emulate_sort_update();

var xpuv=$("#xpu").val();
xpuv=parseInt(xpuv);
var x=1;
while(x<=xpuv){
if(x>xpu){
var xv=x-1;

var vara=\'[rel=\'+x+\']\';
	$(vara).attr("rel",xv);

$("#tagwall_uploaderdv"+x).attr("id","tagwall_uploaderdv"+xv);
$("#pnphotoco"+x).attr("id","pnphotoco"+xv);
$("#nphotoc"+x).attr("id","nphotoc"+xv);
$("#selectvo"+x).attr("id","selectvo"+xv);
$("#clickaf"+x).attr("id","clickaf"+xv);
$("#nphoto"+x).attr("id","nphoto"+xv);

$("#maquina"+x).attr("id","maquina"+xv);
$("#mphoto"+x).attr("id","mphoto"+xv);
$("#selectop"+x).attr("id","selectop"+xv);
$("#selectopu"+x).attr("id","selectopu"+xv);
$("#albcoverl"+x).attr("id","albcoverl"+xv);
$("#clicktt"+x).attr("id","clicktt"+xv);
$("#currentp"+x).attr("id","currentp"+xv);
$("#says"+x).attr("id","says"+xv);
$("#city"+x).attr("id","city"+xv);
$("#ctot"+x).attr("id","ctot"+xv);
$("#ctotv"+x).attr("id","ctotv"+xv);
$("#loc"+x).attr("id","loc"+xv);
$("#cityc"+x).attr("id","cityc"+xv);
$("#statec"+x).attr("id","statec"+xv);
$("#countryc"+x).attr("id","countryc"+xv);
$("#editpiw"+x).attr("id","editpiw"+xv);
$("#editpiwv"+x).attr("id","editpiwv"+xv);
$("#toteti"+x).attr("id","toteti"+xv);
$("#ctoteti"+x).attr("id","ctoteti"+xv);
$("#pnphotoc"+x).attr("id","pnphotoc"+xv);
$("#uploading"+x).attr("id","uploading"+xv);
$("#uploadingv"+x).attr("id","uploadingv"+xv);
$("#uploadingm"+x).attr("id","uploadingm"+xv);
$("#uploadingt"+x).attr("id","uploadingt"+xv);


}
x++;
}



xpur=oxpu-1-'.$xg.';

xpuv=xpuv-1;
$("#xpu").val(xpuv);

xpuo--;
cuploaded--;';

if(!isset($_POST['media'])){
$nphotos.='
if(cuploaded==0){
document.title=org_doc_title;
}
else{
document.title="("+cuploaded+") Upload Complete";
}
';
}

$nphotos.='
var imgorder="";
imgorder = $("#sortable").sortable(\'toArray\').toString();

imgorderl=imgorder.split(",");
imgorderll=imgorderl.length-1;
if(imgorderll!="0"){
		x=0;
		rx='.$xg.';
		var y='.$xg.';
		while(x<=imgorderll){
			if(strpos(imgorderl[x],"uploading")!==false || strpos(imgorderl[x],"error")!==false || imgorderl[x]==""){}
			else{
			y=y+1;
			if(rx>=xpuo){
			var este=imgorderl[x];
			este=este.replace("pnphotoc","");
			este=parseInt(este);
			var actuale=$("#nphotoc"+este).attr("name");
			$("#nphotoc"+este).attr("name",y);
			}
			rx++;
			}
			x++;
		}
}
if(xpuo=="0"){
$("#progressbars").css("display","none");
$("#photouploader").css("display","");
$("#fuploader").css("display","block");
}
var arxpu=$("#arxpu").val();
arxpu=parseInt(arxpu);
if(arxpu==1){arxpu="";}
else{arxpu=arxpu-1;}
$("#arxpu").val(arxpu);
$("#arxpuv").val(arxpu);
$("#axr").val(arxpu);
});


$( "#sortable" ).sortable( "option", "disabled", false );



	}
});


}

var donemedia=null;
var donemediav=null;

//$("#uploadedfile").click(function(e){e.stopPropagation();});

$(document).unbind("keyup");';

if(isset($_POST['media'])){
$nphotos.='
$(document).keyup(function(e) {
	if (e.keyCode == 27) { var ce=$("#cuadradito"); if(ce.length>0){var cc=$("#cuadradito").css("display"); if(cc=="block"){$(".jTagSaveClose").click();} } }
});
';
}
else{
$nphotos.='
$(document).keyup(function(e) {
	if (e.keyCode == 27) { var ce=$("#cuadradito"); if(ce.length>0){var cc=$("#cuadradito").css("display"); if(cc=="block"){$(".jTagSaveClose").click();} else{$("#fuploaderv").click();} } else{$("#fuploaderv").click();} }  // esc
	else if (e.keyCode == 76){
		if(($(document.activeElement).is("input")==true) || ($(document.activeElement).is("textarea")==true)){}
		else{
		like(\'likepic26\');
			}
		} //l
});
;
';
}
$nphotos.='



</script>';

$nphotos.='
<div id="typeanynamews" style="display:none;">
<div id="typeanynamew" style="z-index:305;position:relative;bottom:-10px;height:auto;">
<div class="jTagInput" style="min-height:33px;width:220px;cursor:default;background:#ffffff;border:1px solid #333333;z-index:4;position:relative;margin-left:-110px;left:50%;height:auto;"><div class="nub" style="position:absolute;top:-6px;z-index:5;"></div><input class="dcphlgc typeany" type="text" id="jTagLabel" value="Type any name" onKeyUp="javascript:return submitonEnterpt(event);" style="position:relative;top:4px;left:0px;border:1px solid #cccccc;width:202px;" title="Type any name" placeholder="Type any name"><div id="recent_tags" style="margin-left:4px;margin-top:12px;width:210px;position:relative;display:none;"><div style="color:#777777;position:relative;top:-1px;margin-bottom:2px;margin-left:6px;">Recent Tags:</div></div><div id="recent_tagsv" style="margin-left:-1px;margin-top:12px;width:210px;position:relative;display:none;"></div></div><div class="jTagSaveClose" style="visibility:hidden;display:none;"></div><div class="jTagSave" style="display:none;"></div></div></div>

<script type="text/javascript">
		$("#jTagLabel").autocomplete({
					appendTo: "#recent_tagsv",
					autoFocus:true,
			source: function(request, response) {
            var corder=$("#jTagLabel").parents("li").eq(0).attr("data-xpu");
            var dval=$("#ctoteti"+corder).val();
            var special=dval.split(",");
            var narr=new Array();
            var ax_narr=0;
            $(special).each(function(k,v){
            narr[ax_narr]=$("#otag"+v).attr("name");
            ax_narr++;
            });
            var dval="";
            $(narr).each(function(k,v){
            dval+=","+v;
            });
            
								$.ajax({
									url: "/autocomplete/jump_note.php",
									dataType: "json",
									data: {
										term : request.term,
                                        a_fv:dval
									},
									success: function(data) {
										response(data);
									}
								});
						},
		open: function(event, ui){
			$("#recent_tags").css("display","none");

					var where=$("#recent_tagsv").children(".ui-autocomplete");
					$(where).attr("style","display:inline-block;position:relative;border:0;");

			$("#recent_tagsv").css("display","inline-block");

			},
			close: function(event,ui){
				$("#recent_tagsv").css("display","none");
			},
			select: function( event, ui ) {

				$( "#love" ).val( ui.item.uidv );
				$( "#jTagLabel" ).val( ui.item.value );
				$(".jTagSaveBtn").click();
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"width:212px!important;\\" class=\\"autocompletedark\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a class="clearfix put adl"><img src="\'+item.imgurl+\'" style="width:50px;height:50px;float:left;"><div class="clearfix"><div style="float:left;position:relative;margin-left:5px;font-weight:bold;">\'+item.value+\'</div></div></a>\' )
				.appendTo( ul );
		};



var drecent_tagsooo=function(){
$(".adl").css("border-color","#ffffff");
$(".adl").css("border-width","1px 0px;");
$(".adl").css("color","#333333"); $(".adl").css("background","#ffffff");  $(this).css("color","#ffffff"); $(this).css("background","#6d84b4"); $(this).css("border-width","1px 0px"); $(this).css("border-style","solid"); $(this).css("border-color","#3b5998 #ffffff");
}


function jtaglabelb(){
jtaglabelu();
$("#recent_tags,#recent_tagsv").on("mouseenter",".adl",drecent_tagsooo);
}

function jtaglabelu(){
$("#recent_tags,#recent_tagsv").off("mouseenter",".adl",drecent_tagsooo);
}
jtaglabelb();

$("#photouploader,#morephotosu").bind("click",function(){
simupload(actual_input_file);
});
</script>

<div class="jTagSaveBtn" style="visibility:hidden;display:none;"></div>
';

if(!isset($_POST['media'])){
echo $nphotos;
include("end.php");
} // en lo posible sustitur tanto div con posicion absoluta de el marco de la derecha despues de album title y album description for una tabla con float right
?>