<?php
include("headerjs.php");
?>
<?php
echo
'
$.fn.reverse=[].reverse;
$.fn.removev=function(){
$(this).addClass("hidden_sb");
$(this).remove();	
}
$.fn.textareato = function(start, end) {
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd("character", end);
            range.moveStart("character", start);
            range.select();
        }
    });
};

function daymonthyear_function(){
var d = new Date();
var curr_date = d.getDate();
if(curr_date<10){
curr_date=0+""+curr_date;	
}
var curr_month = d.getMonth();
curr_month++;
if(curr_month<10){
curr_month=0+""+curr_month;	
}
var curr_year = d.getFullYear();
var str=curr_date+"."+curr_month+"."+curr_year;
return str;
}

function formatAMPM(date) {
	if(!date){
	date=new Date();	
	}
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? "0"+minutes : minutes;
  var strTime = hours + ":" + minutes + " " + ampm;
  return strTime;
}

function hour_min_function(){
return formatAMPM();
}
';
?>
<?php // ob_end_flush(); ?>