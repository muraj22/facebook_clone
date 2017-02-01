<?php
if(!function_exists("get_list_class")){

$glca=array();
$glca['family']='familysp';
$glca['acquaintances']='acquaintancessp';
$glca['close_friends']='closesp';
$glca['restricted']='restrictedsp';
$glca['location']='areasp';
$glca['work']='worksp';
$glca['education']='edusp';
$glca['custom']='customlistsp';

//extended for privacy
$glca['public']='mundop';
$glca['friends']='friendsp';
$glca['only_me']='candadop';
$glca['customv']='wrenchp'; //wrench


//get list class array

function get_list_class($w){
global $glca;
$glcav=$glca[$w];
return $glcav;
}




function get_list_desc($w,$institution){
$glda=array();
$glda['family']='Your close or extended family.';
$glda['acquaintances']='Friends you want to see less of in News Feed.';
$glda['close_friends']='Best friends you want to see more of on Upfrev.';
$glda['restricted']='Friends who can only see posts and profile info you make public.';
$glda['location']='Friends who live within 10 miles of '.$institution.'.';
$glda['work']='Coworkers at '.$institution.'.';
$glda['education']='Classmates who went to '.$institution.'.';
$glda['custom']='Custom list';

$gldav=$glda[$w];
return $gldav;	
}


$glpa=array();
$glpa['family']='Add relatives to this list';
$glpa['acquaintances']='Add friends to this list';
$glpa['close_friends']='Add friends to this list';
$glpa['restricted']='Add friends to this list';
$glpa['location']='Add local friends to this list';
$glpa['work']='Add coworkers to this list';
$glpa['education']='Add classmates to this list';
$glpa['custom']='Add friends to this list';
function get_list_ph($w){
global $glpa;
$glpav=$glpa[$w];
return $glpav;
}
}
?>