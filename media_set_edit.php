<?php  
include("start.php");
include("populate_page.php");
?>
<?php $params['style']='

<style type="text/css">
.delcv{
margin-left:1px;
margin-right:1px;
margin-top:1px;
margin-bottom:1px;
vertical-align:top;
background-image:url("/images/Sn8URR2YafD.png");
background-position:0 0;	
background-repeat:no-repeat;
display:inline-block;
height:12px;
width:11px;
cursor:pointer;
line-height:13px;
text-align:center;
white-space:nowrap;
}
.uioverlay,body,#main_divg{width:100%!important;}
#awrap{position:relative;right:0!important;}
</style>';

$uidv=$uid;
$echo.='
<div id="firsttagen">';
$_GET['album']=$_GET['a'];
$_POST['uidv']=$uidv;
$_POST['media']='e';
$echo.='
<script type="text/javascript">
$("#secondtagen").html("");
$(".secondtag").remove();
var wire_settoport=false;
</script>';
$_POST['switch']=0;
include("photo_uploader.php");
$echo.=$nphotos;
$echo.='
<script type="text/javascript">
photos();	
var global_uidv="'.$uid.'";
var global_switch=1;
var global_addphotos_button="?album='.$_GET['a'].'";
</script>';
$echo.='
</div>
';

	include("master/addphotos_button.php");
	$echo.=$secho;
	
$alb=$_GET['a'];
$r=mysql_query("SELECT * FROM media WHERE albumid='$alb' AND id='$uid' AND visibility!='d' ORDER BY norder");
$totalp=mysql_num_rows($r)-1;
$echo.='
	
<div style="display:none;" id="totalp">'.$totalp.'</div>
<script type="text/javascript">
function preaddok(toteti,xpu){
	  $("#toteti"+xpu).val(toteti);
	  $("#ctotv"+xpu).html(toteti);
      $("#ctot"+xpu).removeClass("ctot");
      $("#ctot"+xpu).addClass("ctotv");
}
function addok(xpu,width,height,top_pos,left,label,id,ujs){
		 
		var ctoteti=$("#ctoteti"+xpu).val(); 
count=Math.random();
count=count.toString();
count=count.replace(".","");

					var tag =\'<div class="jTagTag hidden_sb" id="tag\'+count+\'"style="width:\'+width+\'px;padding-left:2px;padding-right:2px;height:\'+height+\'px;top:\'+top_pos+\'%;left:\'+left+\'%;border:0;display:none;" name=""><div style="width:100%;height:100%"></div><div style="width:100px;margin:0;padding:0;position:relative;height:0px;left:-25px;" onmouseover="document.getElementById(\\\'tag\\\'\'+count+\').style.opacity=\\\'0\\\';"><div class="jTagDeleteTag" style="visibility:hidden;" id="tagv\'+count+\'"></div><div class="jpointer" id="tagvv\'+count+\'"></div><span id="tagvvv\'+count+\'" style="padding-left:5px;padding-right:5px;">\'+label+\'</span></div></div></div>\';
					
					$("#tagoverlay").append(tag);
					
					$("#bsaved").val(count);
					
                    $("#ctoteti"+xpu).val(ctoteti+","+count); 
					if(ujs=="n"){ujs="";}
					setrid(id,ujs);			
}';

$echo.='
</script>';

include("more_pics.php");
$echo.=$secho;

$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='no_columns_no_borders';


include("end.php");
?>