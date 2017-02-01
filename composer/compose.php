<?php
include("start.php");
$grs=grs(20);

$uti=sb_user($uidv);

if($uid==$uidv){ //uso normal sin auto select
$data_ac="";
}
else{
$data_ac='data-ac_starts="select_uidv_ac"';
}

echo'
<div class="_20y" style="padding-right:5px;padding-left:5px;">
<table style="margin-top:4px;" class="uiGrid _24f"><tr><td class="_210" style="vertical-align:middle;">To:</td><td class="_20_"><div style="display:block;"><div style="width:100%;margin:0;margin-bottom:-1px;margin-left:0px;min-height:20px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_position="fixed" data-ac_padding="padding:3px;padding-left:1px;margin-bottom:-2px;" data-ac_enable="msg'.$grs.'" data-ac_liwidth="198" data-ac_inputw="342" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_placeholder="Name or email" data-ac_alsoemail="t" '.$data_ac.' data-uidv="'.$uidv.'" data-fullname="'.$uti['fullname'].'"></div></div></td></tr></table>';

if(isset($transfer)){
$r=mysql_query("SELECT * FROM bank WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$amount=$m['amount'];	
$amount=$amount-($amount/100*3);
}
if($amount<1){
$dmin=0;	
}
else{
$dmin=1;	
}
echo'<table style="margin-top:4px;" class="uiGrid _24f"><tr><td class="_210" style="vertical-align:middle;">Amount:</td><td class="_20_"><input id="amountv" style="width:60px;font-size:11px;"><div id="bank_sliderv" style="display:block;background: #64bf71;height: 15px;position: relative;left: 20px;border: 1px solid #d9d9d9;border-radius: 3px;display: inline-block;width: 270px;top: 5px;"></div>

<input type="hidden" id="fundsv" name="fundsv">

<script type="text/javascript">
   $( "#bank_sliderv" ).slider({
      range: "max",
      min: '.$dmin.',
      max: '.$amount.',
      value: '.$dmin.',
      slide: function( event, ui ) {
	var formated=ui.value;
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
    $( "#amountv" ).val( "$"+formated );
	$("#fundsv").val(ui.value);
      }
    });
	$("#bank_sliderv").find(".ui-slider-range").css("border","0");
	var formated=$( "#bank_sliderv" ).slider( "value" );
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
   $( "#amountv" ).val( "$"+formated );
   $("#fundsv").val($( "#bank_sliderv" ).slider( "value" ));

$("#amountv").blur(function(){
var dval=$(this).val();
dval=dval.replace(",","");
dval=dval.replace("$","");
var dval=parseFloat(dval);
	if(dval>'.$amount.'){
	dval='.$amount.';	
	}
	var formated=dval;
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
	if(formated=="0.00"){
	formated='.$dmin.';	
	dval='.$dmin.';
	}
	$("#bank_sliderv").slider("value",dval);
	$("#fundsv").val(dval);
    $( "#amountv" ).val( "$"+formated );
});
</script>

</td></tr></table>';	
}
echo'
<div><div class="_2qi"><div class="_20-"><textarea data-au_grow="" autocomplete="off" title="Write a message..." name="message" style="height:
56px;min-height:56px;max-height:135px;width:100%;padding:3px;cursor:text;margin-left:0px;" rows="4" class="uiTextareaNoResize uiTextareaAutogrow _2oj dcphogvc" placeholder="Write a message..."></textarea></div></div>
</div>
<div style="text-align:right;"></div>
</div>
';

?>
<?php
include("end.php");
?>