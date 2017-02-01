<?php

function convert_number($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
} 


$cvt=convert_number($x);
$cvt=strtolower($cvt);
$wp=$_POST['provider'];
if($wp=="yahoo"){$wp="Yahoo!";}
else if($wp=="microsoft"){$wp='Windows Live Hotmail';}
if($x>1){$sd='s';}
else{$sd='';}
echo'
<div class="friendstitlewrapper">
<div class="friendstitle" style="position:relative;"><div class="friendstitleicon"></div>Friends</div>
</div>
<div class="addcontactswrapper">
<div class="addcontacts" style="background:#ffffff;color:#333333;font-weight:bold;font-size:13px;word-wrap:break-word;">You have '.$cvt.' '.$wp.' contact'.$sd.' on Upfrev that you can add as your friend'.$sd.'.</div>
</div>

<div class="friendslinkv" style="margin:0;padding:0;display:block;margin-top:5px;">
Select which contacts to add as a friend from the list below. You can also <a href="/find_friends.php">try another email account</a> to find more friends.
</div>

<div class="stepswrapper">

<div class="partback2"></div>
<div class="partmiddle2" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 1</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Find Friends</div></div>


<div class="partback3"></div>
<div class="partmiddle" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 2</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Add Friends</div></div>
<div class="partfront"></div>

<div class="partmiddle2" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 3</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Invite Friends</div></div>
<div class="partfront2"></div>

</div>


<script type="text/javascript">
function selallfv(){
var dem=$(".checkbv").length;
var demv=$(".checkbv:checked").length
var deml=dem-demv;
if(deml>0){
$(".checkbv").attr("checked","checked");	
$("#selectallfv").attr("checked","checked");
}
else{
$(".checkbv:checked").removeAttr("checked");	
$("#selectallfv").removeAttr("checked");	
}
}
function gocv(w){
var a=$(\'#checkbv\'+w).attr(\'checked\');
if(a===false){
$(\'#checkbv\'+w).attr(\'checked\',\'checked\');	
}
else{
$(\'#checkbv\'+w).removeAttr(\'checked\');		
}
var toti=$(".checkbv").length;
var totc=$(".checkbv:checked");
var totcl=totc.length;
if(toti==totcl){$("#selectallfv").attr("checked","checked");}
else{$("#selectallfv").removeAttr("checked");}
}
function gocev(){
var toti=$(".checkbv").length;
var totc=$(".checkbv:checked");
var totcl=totc.length;
if(toti==totcl){$("#selectallfv").attr("checked","checked");}
else{$("#selectallfv").removeAttr("checked");}
}
</script>

<table class="tableself" cellspacing="0" cellpadding="0" style="width:100%;">
<tr><td style="width:24px;padding:5px;"><input type="checkbox" checked="checked" id="selectallfv" name="selectallfv" onclick="selallfv();"></td>
<td style="padding:5px;font-size:11px;text-align:left;" class="selectallf"><a href="#" onclick="selallf(); return false;">Select All Friends</a></td></tr>
</table>

<div style="border:1px solid rgb(187, 187, 187);margin:0;padding:0;display:block;max-height:270px;overflow-y:auto;">
<table style="border-collapse:collapse;width:100%;" cellspacing="0" cellpadding="0">';

$r=0;
foreach($demail as $key=> $value){
	echo'<tr><td style="width:24px;padding:5px;border-bottom:1px solid rgb(238, 238, 238);"><input value="'.$did[$key].'" type="checkbox" id="checkbv'.$r.'" class="checkbv" checked="checked" onclick="gocev();"></td>
	<td style="padding:5px;width:60px;border-bottom:1px solid rgb(238, 238, 238);text-align:left;" onclick="gocv('.$r.');"><img title="'.$value.'" src="/'.$did[$key].'/pics/'.$dprofilepic[$key].'" style="width:50px;height:50px;margin-right:5px;"></td>
	<td style="padding:5px;border-bottom:1px solid rgb(238, 238, 238);text-align:left;" onclick="gocv('.$r.');"><div style="margin:0;padding:0;color:#333333;font-weight:bold;font-size:13px;display:block;" title="'.$value.'">'.$dfullname[$key].'<div style="display:block;margin:0;padding:0;color:gray;font-size:11px;font-weight:normal;">'.$value.'</div></div></td></tr>';
$r++;
}

echo'
</table>

</div>

<script type="text/javascript">
function submitst(){
  $("#renewsteps").html("");
  $("#renewsteps").append($("#thirdst"));
  $("#thirdst").css("display","inline-block");
}

function addfr(){

var nenas="";

$(".checkb:checked").each(function() {
                var nena=$(this).val();
				nenas+=nena+",";	
        }); 

	$.ajax({
  async: "false",
  type: "POST",
  url: "addfriends.php",
  data: {uidvs:nenas},
  success: function(response) {
  submitst();
  }
});

}
</script>


<label class="skipa" style="float:right;position:relative;right:0px;top:10px;display:inline-block;" onclick="submitst();"><input class="skipa2" type="button" value="Skip"></label>
<label class="addfriendsb" style="float:right;position:relative;right:0px;top:10px;display:inline-block;" onclick="addfr();"><input class="addfriendsb2" type="button" value="Add Friends"></label>





';





echo'';
?>