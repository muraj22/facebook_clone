<?php
class human{
var $legs=2;
var $arms=2;
function human($hcolor){
       $this->hcolor=$hcolor;
}
function report(){
return  "This <b>".get_class
($this)."</b> has <b>" .$this->haircolor. "</b> hair,and
<b>" .$this->legs. "</b> legs<br>" ;
}
}
//instantiate the class
$jude = new human();
echo "Jude has " .$jude->legs." legs";

$pablo = new human("brown");
$userl=$pablo->legs++;

$pablo->haircolor="brown";

$userreport=$pablo->report();
?>