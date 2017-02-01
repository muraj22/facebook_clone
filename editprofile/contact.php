<?php
$echo.='
<script type="text/javascript">
$("#linksedit9").removeClass("linkseditv");
$("#linksedit9").addClass("linksedit");
</script>
<div class="mainweduwork" style="height:auto;border-bottom:0;">
<table class="eduworkft" cellspacing="0" cellpadding="0" style="margin-left:5px;">
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Emails:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:9px;">';
$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND primary2='p' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$email=$m['email'];
$psbid=$m['sbid'];
}
$echo.= $email;
$echo.='</td><td class="edittd">';

$uidv=$uid;

$ltypev="contact_emails";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);
unset($psbid);

$echo.='</td>
</tr>';

$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND primary2!='p' and confirmed!='u' AND visibility='v' ORDER BY datetimep ASC LIMIT 5");
while($m=mysql_fetch_array($r)){
$echo.='<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;"></div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:3px;">';
$echo.=$m['email'];	
$echo.='</td><td class="edittd">';

$uidv=$uid;

$ltypev="contact_emails";

$sbid=$m['sbid'];

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm hidden_sb" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>';
}
unset($psbid);
$echo.='
<tr>
<th></th>
<td><div class="onel"><a href="#" onclick="return false;">Add / Remove Emails</a></div></td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
<script type="text/javascript">
function setcc(w){
$("#"+w).html(\'<option value="AF">Afghanistan (+93)</option><option value="AL">Albania (+355)</option><option value="DZ">Algeria (+213)</option><option value="AS">American Samoa (+1)</option><option value="AD">Andorra (+376)</option><option value="AO">Angola (+244)</option><option value="AI">Anguilla (+1)</option><option value="AG">Antigua (+1)</option><option value="AR">Argentina (+54)</option><option value="AM">Armenia (+374)</option><option value="AW">Aruba (+297)</option><option value="AU">Australia (+61)</option><option value="AT">Austria (+43)</option><option value="AZ">Azerbaijan (+994)</option><option value="BH">Bahrain (+973)</option><option value="BD">Bangladesh (+880)</option><option value="BB">Barbados (+1)</option><option value="BY">Belarus (+375)</option><option value="BE">Belgium (+32)</option><option value="BZ">Belize (+501)</option><option value="BJ">Benin (+229)</option><option value="BM">Bermuda (+1)</option><option value="BT">Bhutan (+975)</option><option value="BO">Bolivia (+591)</option><option value="BQ">Bonaire, Sint Eustatius and Saba (+599)</option><option value="BA">Bosnia and Herzegovina (+387)</option><option value="BW">Botswana (+267)</option><option value="BR">Brazil (+55)</option><option value="IO">British Indian Ocean Territory (+246)</option><option value="VG">British Virgin Islands (+1)</option><option value="BN">Brunei (+673)</option><option value="BG">Bulgaria (+359)</option><option value="BF">Burkina Faso (+226)</option><option value="BI">Burundi (+257)</option><option value="KH">Cambodia (+855)</option><option value="CM">Cameroon (+237)</option><option value="CA">Canada (+1)</option><option value="CV">Cape Verde (+238)</option><option value="KY">Cayman Islands (+1)</option><option value="CF">Central African Republic (+236)</option><option value="TD">Chad (+235)</option><option value="CL">Chile (+56)</option><option value="CN">China (+86)</option><option value="CO">Colombia (+57)</option><option value="KM">Comoros (+269)</option><option value="CK">Cook Islands (+682)</option><option value="CR">Costa Rica (+506)</option><option value="CI">Côte d\\\'Ivoire (+225)</option><option value="HR">Croatia (+385)</option><option value="CU">Cuba (+53)</option><option value="CW">Curaçao (+599)</option><option value="CY">Cyprus (+357)</option><option value="CZ">Czech Republic (+420)</option><option value="CD">Democratic Republic of the Congo (+243)</option><option value="DK">Denmark (+45)</option><option value="DJ">Djibouti (+253)</option><option value="DM">Dominica (+1)</option><option value="DO">Dominican Republic (+1)</option><option value="EC">Ecuador (+593)</option><option value="EG">Egypt (+20)</option><option value="SV">El Salvador (+503)</option><option value="GQ">Equatorial Guinea (+240)</option><option value="ER">Eritrea (+291)</option><option value="EE">Estonia (+372)</option><option value="ET">Ethiopia (+251)</option><option value="FK">Falkland Islands (+500)</option><option value="FO">Faroe Islands (+298)</option><option value="FM">Federated States of Micronesia (+691)</option><option value="FJ">Fiji (+679)</option><option value="FI">Finland (+358)</option><option value="FR">France (+33)</option><option value="GF">French Guiana (+594)</option><option value="PF">French Polynesia (+689)</option><option value="GA">Gabon (+241)</option><option value="GE">Georgia (+995)</option><option value="DE">Germany (+49)</option><option value="GH">Ghana (+233)</option><option value="GI">Gibraltar (+350)</option><option value="GR">Greece (+30)</option><option value="GL">Greenland (+299)</option><option value="GD">Grenada (+1)</option><option value="GP">Guadeloupe (+590)</option><option value="GU">Guam (+1)</option><option value="GT">Guatemala (+502)</option><option value="GN">Guinea (+224)</option><option value="GW">Guinea-Bissau (+245)</option><option value="GY">Guyana (+592)</option><option value="HT">Haiti (+509)</option><option value="HN">Honduras (+504)</option><option value="HK">Hong Kong (+852)</option><option value="HU">Hungary (+36)</option><option value="IS">Iceland (+354)</option><option value="IN">India (+91)</option><option value="ID">Indonesia (+62)</option><option value="IR">Iran (+98)</option><option value="IQ">Iraq (+964)</option><option value="IE">Ireland (+353)</option><option value="IL">Israel (+972)</option><option value="IT">Italy (+39)</option><option value="JM">Jamaica (+1)</option><option value="JP">Japan (+81)</option><option value="JO">Jordan (+962)</option><option value="KZ">Kazakhstan (+7)</option><option value="KE">Kenya (+254)</option><option value="KI">Kiribati (+686)</option><option value="XK">Kosovo (+381)</option><option value="KW">Kuwait (+965)</option><option value="KG">Kyrgyzstan (+996)</option><option value="LA">Laos (+856)</option><option value="LV">Latvia (+371)</option><option value="LB">Lebanon (+961)</option><option value="LS">Lesotho (+266)</option><option value="LR">Liberia (+231)</option><option value="LY">Libya (+218)</option><option value="LI">Liechtenstein (+423)</option><option value="LT">Lithuania (+370)</option><option value="LU">Luxembourg (+352)</option><option value="MO">Macau (+853)</option><option value="MK">Macedonia (+389)</option><option value="MG">Madagascar (+261)</option><option value="MW">Malawi (+265)</option><option value="MY">Malaysia (+60)</option><option value="MV">Maldives (+960)</option><option value="ML">Mali (+223)</option><option value="MT">Malta (+356)</option><option value="MH">Marshall Islands (+692)</option><option value="MQ">Martinique (+596)</option><option value="MR">Mauritania (+222)</option><option value="MU">Mauritius (+230)</option><option value="YT">Mayotte (+262)</option><option value="MX">Mexico (+52)</option><option value="MD">Moldova (+373)</option><option value="MC">Monaco (+377)</option><option value="MN">Mongolia (+976)</option><option value="ME">Montenegro (+382)</option><option value="MS">Montserrat (+1)</option><option value="MA">Morocco (+212)</option><option value="MZ">Mozambique (+258)</option><option value="MM">Myanmar (+95)</option><option value="NA">Namibia (+264)</option><option value="NR">Nauru (+674)</option><option value="NP">Nepal (+977)</option><option value="NL">Netherlands (+31)</option><option value="NC">New Caledonia (+687)</option><option value="NZ">New Zealand (+64)</option><option value="NI">Nicaragua (+505)</option><option value="NE">Niger (+227)</option><option value="NG">Nigeria (+234)</option><option value="NU">Niue (+683)</option><option value="NF">Norfolk Island (+672)</option><option value="KP">North Korea (+850)</option><option value="MP">Northern Mariana Islands (+1)</option><option value="NO">Norway (+47)</option><option value="OM">Oman (+968)</option><option value="PK">Pakistan (+92)</option><option value="PW">Palau (+680)</option><option value="PS">Palestine (+970)</option><option value="PA">Panama (+507)</option><option value="PG">Papua New Guinea (+675)</option><option value="PY">Paraguay (+595)</option><option value="PE">Peru (+51)</option><option value="PH">Philippines (+63)</option><option value="PL">Poland (+48)</option><option value="PT">Portugal (+351)</option><option value="PR">Puerto Rico (+1)</option><option value="QA">Qatar (+974)</option><option value="CG">Republic of the Congo (+242)</option><option value="RE">Réunion (+262)</option><option value="RO">Romania (+40)</option><option value="RU">Russia (+7)</option><option value="RW">Rwanda (+250)</option><option value="BL">Saint Barthélemy (+590)</option><option value="SH">Saint Helena (+290)</option><option value="KN">Saint Kitts and Nevis (+1)</option><option value="MF">Saint Martin (+590)</option><option value="PM">Saint Pierre and Miquelon (+508)</option><option value="VC">Saint Vincent and the Grenadines (+1)</option><option value="WS">Samoa (+685)</option><option value="SM">San Marino (+378)</option><option value="ST">Sao Tome and Principe (+239)</option><option value="SA">Saudi Arabia (+966)</option><option value="SN">Senegal (+221)</option><option value="RS">Serbia (+381)</option><option value="SC">Seychelles (+248)</option><option value="SL">Sierra Leone (+232)</option><option value="SG">Singapore (+65)</option><option value="SX">Sint Maarten (+599)</option><option value="SK">Slovakia (+421)</option><option value="SI">Slovenia (+386)</option><option value="SB">Solomon Islands (+677)</option><option value="SO">Somalia (+252)</option><option value="ZA">South Africa (+27)</option><option value="KR">South Korea (+82)</option><option value="SS">South Sudan (+211)</option><option value="ES">Spain (+34)</option><option value="LK">Sri Lanka (+94)</option><option value="LC">St. Lucia (+1)</option><option value="SD">Sudan (+249)</option><option value="SR">Suriname (+597)</option><option value="SZ">Swaziland (+268)</option><option value="SE">Sweden (+46)</option><option value="CH">Switzerland (+41)</option><option value="SY">Syria (+963)</option><option value="TW">Taiwan (+886)</option><option value="TJ">Tajikistan (+992)</option><option value="TZ">Tanzania (+255)</option><option value="TH">Thailand (+66)</option><option value="BS">The Bahamas (+1)</option><option value="GM">The Gambia (+220)</option><option value="TL">Timor-Leste (+670)</option><option value="TG">Togo (+228)</option><option value="TK">Tokelau (+690)</option><option value="TO">Tonga (+676)</option><option value="TT">Trinidad and Tobago (+1)</option><option value="TN">Tunisia (+216)</option><option value="TR">Turkey (+90)</option><option value="TM">Turkmenistan (+993)</option><option value="TC">Turks and Caicos Islands (+1)</option><option value="TV">Tuvalu (+688)</option><option value="UG">Uganda (+256)</option><option value="UA">Ukraine (+380)</option><option value="AE">United Arab Emirates (+971)</option><option value="GB">United Kingdom (+44)</option><option value="US">United States (+1)</option><option value="UY">Uruguay (+598)</option><option value="VI">US Virgin Islands (+1)</option><option value="UZ">Uzbekistan (+998)</option><option value="VU">Vanuatu (+678)</option><option value="VA">Vatican City (+39)</option><option value="VE">Venezuela (+58)</option><option value="VN">Vietnam (+84)</option><option value="WF">Wallis and Futuna (+681)</option><option value="YE">Yemen (+967)</option><option value="ZM">Zambia (+260)</option><option value="ZW">Zimbabwe (+263)</option>\');
}
';

$r=mysql_query("SELECT * FROM ipliving WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$countryc=$m['countryc'];
}

 mysql_select_db("registered");
if(!isset($countryc)){
$countryc='US';	
}


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$echo.='
</script>
<div style="display:none;">
<table>
<tr id="copymphone">
<th></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<select id="phoneextc" class="phoneext"></select>
<br>
<input autocomplete="off" type="text" class="phonec" size="14" id="phonein">
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="contact_phones";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param=0;

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
</table>
</div>
</td></tr>
<tr id="mphoneafter1" class="mphone ep_contact_wrap">
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Mobile&nbsp;Phones:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<input autocomplete="off" type="hidden" id="totalmp">
<select id="phoneext1" class="phoneext"></select>
<br>
<input autocomplete="off" type="text" class="phonec" size="14" id="phonein1">
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="contact_phones";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm hidden_sb" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param=0;

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<th></th>
<td style="padding:3px 0px 1px;">

<script type="text/javascript">
function addmphone(m){


var totalmp=$("#totalmp").val();

totalmp=parseInt(totalmp);
var ptotalmp=totalmp;
totalmp=totalmp+1;
$("#totalmp").val(totalmp);
var tocopy=$("#copymphone").html();

tocopy=tocopy.replace("phoneextc","phoneext"+totalmp);
tocopy=tocopy.replace("phonein","phonein"+totalmp);

$(\'#mphoneafter\'+ptotalmp).after(\'<tr id="mphoneafter\'+totalmp+\'" class="hidden_sb mphone ep_contact_wrap">\'+tocopy+\'</tr>\');

if(!m){
$("#mphoneafter"+totalmp).find(".uiList.hidden_sb").eq(0).removeClass("hidden_sb");
}
$("#mphoneafter"+totalmp).removeClass("hidden_sb");


$("#phoneext"+totalmp).val("'.$countryc.'");
}
</script>
<div class="onel"><a href="#" onclick="addmphone(); return false;">Add another phone</a></div></td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">

<script type="text/javascript">
$("#totalmp").val("1");
setcc("phoneextc");
$("#phoneextc").val("'.$countryc.'");
setcc("phoneext1");
';
$eneed='';
$anx=1;
$startf='
$("#phoneext'.$anx.'").val("'.$countryc.'");
$("#phonein'.$anx.'").val("");
';
$r=mysql_query("SELECT * FROM contact_phones WHERE id='$uid' AND visibility='v' AND type='0' ORDER BY datetimep ASC");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){
$phoneext=$m['ext'];
$phonen=$m['phone'];	

if($anx==1){
$echo.='
$("#phoneext1").val("'.$countryc.'");
$("#phoneext'.$anx.'").val("'.$phoneext.'");
$("#phonein'.$anx.'").val("'.$phonen.'");';
}
else if($anx>1){
$echo.='
addmphone("m");
$("#phoneext'.$anx.'").val("'.$phoneext.'");
$("#phonein'.$anx.'").val("'.$phonen.'");';
}

$uidv=$uid;

$ltypev="contact_phones";

$sbid=$m['sbid'];

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param=0;

include("buttons/privacy_button.php");
$button=str_replace("'","\\'",$button);
$button=str_replace("
","",$button);

$echo.='
var dbutton=\'<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">\';
dbutton+=\''.$button.'\';
dbutton+=\'</ul>\';

$("#mphoneafter'.$anx.'").find(".uiList.hidden_sb").eq(0).before(dbutton);
$("#mphoneafter'.$anx.'").find(".uiList.hidden_sb").eq(0).remove();

';


$anx++;

}
if($c==0){
$echo.=$startf;	
}
$echo.='
$("#mphoneafter'.$anx.'").find(".uiList.hidden_sb").eq(0).removeClass("hidden_sb");
</script>

<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
<script type="text/javascript">

function addophone(m){
var totalmp=$("#totalop").val();
totalmp=parseInt(totalmp);
var ptotalmp=totalmp;
totalmp=totalmp+1;
$("#totalop").val(totalmp);
var tocopy=$("#copyophone").html();

tocopy=tocopy.replace("ophoneextc","ophoneext"+totalmp);
tocopy=tocopy.replace("phoneinv","phoneinv"+totalmp);
tocopy=tocopy.replace("wphone","wphone"+totalmp);

$(\'#ophoneafter\'+ptotalmp).after(\'<tr id="ophoneafter\'+totalmp+\'" class="hidden_sb ophone ep_contact_wrap">\'+tocopy+\'</tr>\');

if(!m){
$("#ophoneafter"+totalmp).find(".uiList.hidden_sb").eq(0).removeClass("hidden_sb");
}
$("#ophoneafter"+totalmp).removeClass("hidden_sb");


$("#ophoneext"+totalmp).val("'.$countryc.'");
}
</script>
<div style="display:none;">
<table>
<tr id="copyophone">
<th></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<select class="phonecv" id="wphone">
<option value="1" selected="selected">Work</option>
<option value="2">Home</option>
</select>
<select class="phoneext" id="ophoneextc">
</select>
<br>
<input autocomplete="off" type="text" class="phonec" size="14" id="phoneinv">
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="contact_phones";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm hidden_sb" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param=1;

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
</table>
</div>
</td></tr>
</td></tr>
<tr id="ophoneafter1" class="ophone ep_contact_wrap">
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Other&nbsp;Phones:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<input autocomplete="off" type="hidden" id="totalop">
<select class="phonecv" id="wphone1">
<option value="1" selected="selected">Work</option>
<option value="2">Home</option>
</select>
<select class="phoneext" id="ophoneext1">
</select>
<br>
<input autocomplete="off" type="text" class="phonec" size="14" id="phoneinv1">
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="contact_phones";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm hidden_sb" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param=1;

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<th></th>
<td style="padding:3px 0px 1px;"><div class="onel"><a href="#" onclick="addophone(); return false;">Add another phone</a></div>

<script type="text/javascript">
$("#totalop").val("1");
setcc("ophoneextc");
$("#ophoneextc").val("'.$countryc.'");
setcc("ophoneext1");
$("#ophoneext1").val("'.$countryc.'");
';
$eneed='';
$anx=1;
$startf='
$("#ophoneext'.$anx.'").val("'.$countryc.'");
$("#phoneinv'.$anx.'").val("");
';
$r=mysql_query("SELECT * FROM contact_phones WHERE id='$uid' AND visibility='v' AND (type='2' OR type='1') ORDER BY datetimep ASC");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){

$phoneext=$m['ext'];
$phonen=$m['phone'];

$workv=$m['type'];

if($anx==1){
$echo.='
$("#wphone'.$anx.'").val("'.$workv.'");
$("#ophoneext'.$anx.'").val("'.$phoneext.'");
$("#phoneinv'.$anx.'").val("'.$phonen.'");
';
}
else if($anx>1){
$echo.='
addophone("m");
$("#wphone'.$anx.'").val("'.$workv.'");
$("#ophoneext'.$anx.'").val("'.$phoneext.'");
$("#phoneinv'.$anx.'").val("'.$phonen.'");	
';
}

$uidv=$uid;

$ltypev="contact_phones";

$sbid=$m['sbid'];

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param=$m['type'];

include("buttons/privacy_button.php");
$button=str_replace("'","\\'",$button);
$button=str_replace("
","",$button);

$echo.='
var dbutton=\'<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">\';
dbutton+=\''.$button.'\';
dbutton+=\'</ul>\';

$("#ophoneafter'.$anx.'").find(".uiList.hidden_sb").eq(0).before(dbutton);
$("#ophoneafter'.$anx.'").find(".uiList.hidden_sb").eq(0).remove(); //son cero por que el anterior no tiene ambas clases, va sin hidden sb de one

';


$anx++;

}
if($c==0){
$echo.=$startf;	
}
$echo.='
$("#ophoneafter'.$anx.'").find(".uiList.hidden_sb").eq(0).removeClass("hidden_sb");
</script>
</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
<input autocomplete="off" type="hidden" id="totalcim">
<script type="text/javascript">
function addcim(m){
var totalmp=$("#totalcim").val();
totalmp=parseInt(totalmp);
var ptotalmp=totalmp;
totalmp=totalmp+1;
$("#totalcim").val(totalmp);
var tocopy=$("#copycim").html();

tocopy=tocopy.replace("improviderc","improvider"+totalmp);
tocopy=tocopy.replace("imname","imname"+totalmp);

$(\'#cimafter\'+ptotalmp).after(\'<tr id="cimafter\'+totalmp+\'" class="hidden_sb cim ep_contact_wrap">\'+tocopy+\'</tr>\');

if(!m){
$("#cimafter"+totalmp).find(".uiList.hidden_sb").eq(0).removeClass("hidden_sb");
}
$("#cimafter"+totalmp).removeClass("hidden_sb");

$("#improvider"+totalmp).val("1");	
}
</script>
<div style="display:none;">
<table>
<tr id="copycim">
<th></th>
<td class="eduworktd" style="padding-top:8px;" colspan="2">
<input autocomplete="off" type="text" class="impr phonec" size="24" id="imname">
<div style="position:relative;margin:0;padding:0;display:inline-block;">
<div style="position:absolute;left:-59px;top:-15px;display:inline-block;">

';

$uidv=$uid;

$ltypev="contact_im";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm hidden_sb" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='

</div>
</div>
<br>
<select class="imprv" id="improviderc">
<option value="1">AIM</option><option value="4">Google Talk</option><option value="5">Windows Live Messenger</option><option value="6">Skype</option><option value="7">Yahoo! Messenger</option><option value="2">Gadu-Gadu</option><option value="3">ICQ</option><option value="9">QQ</option><option value="10">NateOn</option><option value="11">Twitter</option><option value="12">Hyves</option><option value="13">Orkut</option><option value="16">Cyworld</option><option value="18">QIP</option><option value="19">Rediff Bol</option><option value="20">Vkontakte</option><option value="21">eBuddy</option><option value="22">Mail.ru Agent</option><option value="23">Jabber</option>
</select>
</td>
</tr>
</table>
</div>
</td></tr>
<tr id="cimafter1" class="cim ep_contact_wrap">
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;padding-left:30px;"><div style=position:relative;top:8px;margin:0;padding:0;">IM&nbsp;Screen&nbsp;Names:</div></th>
<td class="eduworktd" style="padding-top:8px;" colspan="2">
<input autocomplete="off" type="text" class="impr phonec" size="24" id="imname1">
<div style="position:relative;margin:0;padding:0;display:inline-block;">
<div style="position:absolute;left:-59px;top:-15px;z-index:19;display:inline-block;">';
$uidv=$uid;

$ltypev="contact_im";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm hidden_sb" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);
$echo.='
</div>
</div>
<br>
<select class="imprv" id="improvider1">
<option value="1">AIM</option><option value="4">Google Talk</option><option value="5">Windows Live Messenger</option><option value="6">Skype</option><option value="7">Yahoo! Messenger</option><option value="2">Gadu-Gadu</option><option value="3">ICQ</option><option value="9">QQ</option><option value="10">NateOn</option><option value="11">Twitter</option><option value="12">Hyves</option><option value="13">Orkut</option><option value="16">Cyworld</option><option value="18">QIP</option><option value="19">Rediff Bol</option><option value="20">Vkontakte</option><option value="21">eBuddy</option><option value="22">Mail.ru Agent</option><option value="23">Jabber</option>
</select>
</td>
</tr>
<tr>
<th></th>
<td style="padding:3px 0px 1px;"><div class="onel"><a href="#" onclick="addcim(); return false;">Add another screen name</a></div>';
$echo.='
<script type="text/javascript">
$("#improvider1").val("1");
$("#totalcim").val("1");
';
$eneed='';
$anx=1;
$r=mysql_query("SELECT * FROM contact_im WHERE id='$uid' AND visibility='v'");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){
	$mm=stripslashes($m['user']);
	$mm=addslashes($mm);

if($anx!=1){
$echo.='addcim("m");';
}

$echo.='
$("#improvider'.$anx.'").val("'.$m['provider'].'");
$("#imname'.$anx.'").val("'.$mm.'");
';	

$uidv=$uid;

$ltypev="contact_im";

$sbid=$m['sbid'];

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$button=str_replace("'","\\'",$button);
$button=str_replace("
","",$button);

$echo.='
var dbutton=\'<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">\';
dbutton+=\''.$button.'\';
dbutton+=\'</ul>\';

$("#cimafter'.$anx.'").find(".uiList.hidden_sb").eq(0).before(dbutton);
$("#cimafter'.$anx.'").find(".uiList.hidden_sb").eq(0).remove();

';


$anx++;
}
$echo.='
$("#cimafter'.$anx.'").find(".uiList.hidden_sb").eq(0).removeClass("hidden_sb");
</script>
</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Address:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:6px;">
<input autocomplete="off" type="text" class="addressf" id="address_pr">
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="address";

$sbid="";	

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">City/Town:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<script type="text/javascript">
function swapc(w,v){
	if(v){var vv=2;}
	else{var vv="";}
				$("#editpiw"+vv).removeClass("editpiv");
				$("#editpiwv"+vv).removeClass("editpivv");
				$("#city"+vv).removeClass("editpi2");
				$("#city"+vv).addClass("editpi");
				$("#removeedit"+vv).css("display","none");
				if(w==1){
				$("#city"+vv).val("");
				}
				$("#statec"+vv).val("");
				$("#countryc"+vv).val("");
				$("#cityc"+vv).val("");
				$("#stateedit"+vv).val("2");
				$("#city"+vv).focus();
}
function dov(w,v){
	if(v){var vv=2;}
	else{var vv="";}
var wv=$.trim(w);
var wvv=$("#cityv").val();
if((wv=="") || (wv.length<3)){$("#city").removeClass("working");}
var stateedit=$("#stateedit").val();
if((stateedit=="1") && (wv!=wvv)){
if(v){swapc(2,2);}
else{swapc(2);}
}
}
</script>
<div id="editpiw" style="margin:0;padding:0;display:inline-block;">
<div id="editpiwv" style="margin:0;padding:0;display:inline-block;">
<input autocomplete="off" class="editpi" id="city" onkeyup="dov(this.value);" style="padding-top:3px;padding-bottom:3px;">
<label id="removeedit" class="removeedit" style="display:none;" title="Remove" onclick="swapc(1);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>
</div>
</div>
<input autocomplete="off" type="hidden" id="statec">
<input autocomplete="off" type="hidden" id="countryc">
<input autocomplete="off" type="hidden" id="cityc">
<input autocomplete="off" type="hidden" id="stateedit">
<input autocomplete="off" type="hidden" id="cityv">
<script type="text/javascript">';
$statec="";
$countryc="";
$cityc="";
$v="";

$result=mysql_query("SELECT * FROM address WHERE id='$uid' AND visibility='v'");
while($ms=mysql_fetch_array($result)){
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
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if($v!=""){
$echo.='
				$("#editpiw").addClass("editpiv");
				$("#editpiwv").addClass("editpivv");
				$("#city").removeClass("editpi");
				$("#city").addClass("editpi2");
				$("#removeedit").css("display","block");
				$("#stateedit").val("1");
';	
}
$echo.='
$("#city").val("'.$v.'");
$("#cityv").val("'.$v.'");
$("#statec").val("'.$statec.'");
$("#countryc").val("'.$countryc.'");
$("#cityc").val("'.$cityc.'");

			$(function() {
		$("#city").autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv",
			search:function(){$(this).addClass("working");},
			open:function(){$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			source: "autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value;
				$("#editpiw").addClass("editpiv");
				$("#editpiwv").addClass("editpivv");
				$("#city").removeClass("editpi");
				$("#city").addClass("editpi2");
				$("#removeedit").css("display","block");
				$("#stateedit").val("1");
				$( "#city" ).val(as);
				$( "#cityv" ).val(as);
				$("#statec").val(ui.item.statec);
				$("#countryc").val(ui.item.countryc);
				$("#cityc").val(ui.item.city);
				return false;
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a>\'+item.value + \'</a>\' )
				.appendTo( ul );
		};
	});
</script>
</td>
<td class="edittd" style="width:320px;"></td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Zip:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<input autocomplete="off" type="text" class="addressf" id="zip_pr">
</td>
<td class="edittd" style="width:320px;"></td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Neighborhood:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:8px;">
<input autocomplete="off" type="text" class="addressf" id="neighborhood_pr">
</td>
<td class="edittd" style="width:320px;"></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">';
$r=mysql_query("SELECT * FROM address WHERE id='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$zip=$m['zip'];	
$address=$m['address'];
$address=stripslashes($address);
$address=addslashes($address);
$neighborhood=$m['neighborhood'];
$neighborhood=stripslashes($neighborhood);
$neighborhood=addslashes($neighborhood);
}
$r=mysql_query("SELECT * FROM website WHERE id='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$website=$m['website'];	
}
$echo.='
<script type="text/javascript">
$("#zip_pr").val("'.$zip.'");
$("#address_pr").val("'.$address.'");
$("#neighborhood_pr").val("'.$neighborhood.'");
</script>
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Website:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;padding-top:4px;">
<textarea autocomplete="off" id="website_pr" class="pr_website">'.$website.'</textarea>
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="website";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th></th>
<td style="padding-top:4px;">

<div id="display_error">

</div>
<script type="text/javascript">
if(saveci_contact_f===undefined){
var saveci_contact_f="t";


function retrieve_contact_privacy(w){
var contact_privacy=new Array();

var ax=0;
$(".mainweduwork").find(".mphone,.ophone").find("input[name=ptype]").next("input[name=sbid]").each(function(){

contact_privacy[ax]=$(this).nextAll("input[name=privacy]").eq(0).val();

var ok=$.trim($(this).parents(".ep_contact_wrap").eq(0).find(".phonec").val());
if(ok!=""){
ax++;
}

});

return contact_privacy;
}


function retrieve_contact_privacyh(){
var contact_privacyh=new Array();

var ax=0;
$(".mainweduwork").find(".mphone,.ophone").find("input[name=ptype]").next("input[name=sbid]").each(function(){

contact_privacyh[ax]=$(this).nextAll("input[name=privacyh]").eq(0).val();

var ok=$.trim($(this).parents(".ep_contact_wrap").eq(0).find(".phonec").val());
if(ok!=""){
ax++;
}

});

return contact_privacyh;
}







function retrieve_contact_privacy_im(w){
var contact_privacy=new Array();

var ax=0;
$(".mainweduwork").find(".cim").find("input[name=ptype]").next("input[name=sbid]").each(function(){

contact_privacy[ax]=$(this).nextAll("input[name=privacy]").eq(0).val();
var ok=$.trim($(this).parents(".ep_contact_wrap").eq(0).find(".phonec").val());
if(ok!=""){
ax++;
}

});
//alert(ax);
return contact_privacy;
}


function retrieve_contact_privacyh_im(){
var contact_privacyh=new Array();

var ax=0;
$(".mainweduwork").find(".cim").find("input[name=ptype]").next("input[name=sbid]").each(function(){

contact_privacyh[ax]=$(this).nextAll("input[name=privacyh]").eq(0).val();

var ok=$.trim($(this).parents(".ep_contact_wrap").eq(0).find(".phonec").val());
if(ok!=""){
ax++;
}

});

return contact_privacyh;
}




function saveci_contact(){
$("#warns").css("display","none");

var deletedmphone="";
var mphoneext="";
var mphonein="";

var ax=1;
var totalmp=$("#totalmp").val();

while(ax<=totalmp){
var notem=$("#phonein"+ax).val();
notem=$.trim(notem);

if(notem==""){
deletedmphone+=","+ax;
}
else{
mphoneext+=","+$("#phoneext"+ax).val();
mphonein+=","+notem;
}

ax++;
}


var mphoneextp=mphoneext;
var mphoneinp=mphonein;

var mphoneext="";
var mphonein="";

var ax=1;
var totalmp=$("#totalop").val();

while(ax<=totalmp){

var notem=$("#phoneinv"+ax).val();
notem=$.trim(notem);

if(notem==""){}

else{
var wphone=$("#wphone"+ax).val();
mphoneext+=","+$("#ophoneext"+ax).val();
mphonein+=","+wphone+notem;
}

ax++;
}

var ophoneextp=mphoneext;
var ophoneinp=mphonein;

////alert(mphoneextp);
////alert(mphoneinp);

////alert(ophoneextp);
////alert(ophoneinp);

var mphoneext="";
var mphonein="";

var ax=1;
var totalmp=$("#totalcim").val();

while(ax<=totalmp){

var notem=$("#imname"+ax).val();
notem=$.trim(notem);

if(notem==""){}
else{
mphoneext+=",.,"+$("#improvider"+ax).val();
mphonein+=",.,"+notem;
}

ax++;
}


var improvider=mphoneext;
var imsname=mphonein;

var addressf=$("#address_pr").val();
var statec=$("#statec").val();
var countryc=$("#countryc").val();
var cityc=$("#cityc").val();
var zip=$("#zip_pr").val();
var neighborhood=$("#neighborhood_pr").val();
var website=$("#website_pr").val();

var contact_privacy=retrieve_contact_privacy();
var contact_privacyh=retrieve_contact_privacyh();

var contact_privacy_im=retrieve_contact_privacy_im();
var contact_privacyh_im=retrieve_contact_privacyh_im();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/contact_post.php",
  data: {mphoneextp:mphoneextp,mphoneinp:mphoneinp,ophoneextp:ophoneextp,ophoneinp:ophoneinp,improvider:improvider,imsname:imsname,addressf:addressf,statec:statec,countryc:countryc,cityc:cityc,zip:zip,neighborhood:neighborhood,website:website,contact_privacy:contact_privacy,contact_privacyh:contact_privacyh,contact_privacy_im:contact_privacy_im,contact_privacyh_im:contact_privacyh_im},
  success: function(response) {
	  if(response.length>0){
		document.forms["phoneinvalid"].submit();		  
	  }
else{
		 window.location="/editprofile.php?sk=contact&success=1";
}
	}
});

//better to have this page refresh after saving changes.. for now.

}


}
</script>
<form action="/editprofile.php?sk=contact" method="POST" id="phoneinvalid" name="phoneinvalid">
<input autocomplete="off" type="hidden" name="invalidphone">
</form>
<label class="savecedit" onclick="saveci_contact();"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;display:none;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;" id="warns">
</div>';
if(isset($_GET['success'])){
$echo.='
<script type="text/javascript">
	$(\'#warns\').html(\'<i class="warnsv"></i>Your changes have been saved.\');
	$("#warns").css("display","inline-block");
</script>
';
}
else if(isset($_POST['invalidphone'])){
$echo.='
<script type="text/javascript">
	$(\'#warns\').html(\'<i class="warns"></i>The phone number is invalid.\');
	$("#warns").css("display","inline-block");
</script>
';	
}
$echo.='</td>
</tr>
</table>
</div>
';
?>