<?php
if($ltypev=="albums" || $ltypev=="media"){
    if(($albumn=="Profile Pictures" OR $albumn=="Wall Photos" OR $albumn=="Videos" OR $albumn=="Photos" OR $albumn=="Pins" OR $albumn=="Wall Pins") AND (!isset($album_edit))){$ltypev="media";}
else{
$ltypev="albums";
$sbid=$albumid; //for this particular photos case it is always the sbid of the album to be checked against for privacy
}


	if($albumn=="Photos" || $albumn=="Pins"){
		$photos="t";	
	}
    
if($uid==$uidv){
	if($albumn=="Photos" || $albumn=="Pins"){
	$uid_album_edit="f";
	$peditable="f";		
	}
        else if($albumn=="Profile Pictures" || $albumn=="Wall Photos" || $albumn=="Wall Pins" || $albumn=="Videos" || $peditablev=="t"){
$uid_album_edit="f";
$peditable="t";
}
else{
$uid_album_edit="t";
$peditable="f"; //simple stair logistic to determine if privacy can be editable via privacy button	
}
}
else{
$uid_album_edit="f";
$peditable="f";	
}

}

else{

if($uid==$uidv){
$peditable="t";	
}
else{
$peditable="f";	
}
	
}



if(!isset($extra_param)){
$extra_param="";	
}
if(!isset($shared_privacy)){
$shared_privacy="";	
}

if(!isset($photos)){$photos="f"; $photos_id='';}
else{
	$uid_album_edit="f";
	$peditable="f";		
}
$privacy=get_privacy_button_params($uidv,$sbid,$ltypev,$extra_param,$shared_privacy,$privacy_configuration,$photos,$photos_id);
unset($photos);
unset($shared_privacy);
if($privacy_configuration=="small"){
if($privacy["listtext"]!="Only Me" || $peditable=="f"){
$dclass="hidden_sb";
}
else{
$dclass="";	
}

if($privacy["listtext"]=="Only Me" && $peditable=="f"){
$privacy["listclass"]=$privacy["listclass"].' candado_gris';
}

}
else{
$dclass="";	
}



if($privacy_source=="nf"){

if($ltypev=="albums" || $ltypev=="media"){
if($uid_album_edit=="t"){
if($uidv==$uid){$use_edit_album=" ealbum ";} else{$use_edit_album="";}
$privacy["listtooltip"]="Album: ".$privacy["listtooltip"];	
}

else{$use_edit_album="";}
}
else{$use_edit_album="";}

}
else{
$use_edit_album="";
}



if(isset($watchmode)){
$privacy["listclass"]=get_list_class("customv");	

if($uid==$uidv){
$privacy["listtooltip"]="You can change the audience for each photo in this album";	
}
else{
$privacy["listtooltip"]="Each photo has its own privacy setting";	
}

}


if($peditable=="t" && !isset($watchmode)){
$audienceselector="audienceSelector";
$uinohover="uiSelectorButton";
}
else{
$audienceselector="";
$uinohover=" uiNohover ";
}



if($privacy_source=="gv" && $uid_album_edit=="t" && $ltypev=="albums"){
$audienceselector="ealbum_audienceSelector";
$uinohover="uiSelectorButton";
}



if($peditable=="t"){
$audienceselector.=" uiSelectorNormal";	


if($privacy_source=="av"){
$audienceselector.=" openarrow";	
}


}



if($privacy_source=="gv"){
$uinohover=$uinohover." paddingtop1";
}

if($privacy_source=="gv" && $peditable=="t"){
$audienceselector=$audienceselector." gvaudienceSelector";	
}

if($privacy_source!="wu" && $privacy_source!="shares" && $privacy_source!="hps"){
$uinohover=$uinohover." opacity1";	
$audiencewrapper="";
}
else if($privacy_source=="wu"){
$audiencewrapper="composerAudienceWrapper";
$audienceselector.=" composerAudienceSelector";	
}

if($privacy_source=="shares" || $privacy_source=="ps" || $privacy_source=="hps"){ //font weight normal, opacity .5 and blue arrow :)
$audiencewrapper="composerAudienceWrapper";
}

if($privacy_source=="hps"){
$audiencewrapper.=" audienceopacity1h";
}

if($privacy_source!="ea" && $privacy_source!="pu" && $privacy_source!="ps"){ //edit album, photo uploader, privacy settings
$uinohover.=" uiButtonSuppressed";
}

if($privacy_source=="av"){ //album view
$dclass="hidden_sb";	
$uinohover=$uinohover." paddingtop1";
$audienceselector=$audienceselector." gvaudienceSelector";	
}

if($privacy_source=="snv"){ //single note viewer
$dclass="hidden_sb";
$uinohover=$uinohover." paddingtop1";
$audienceselector=$audienceselector." extrapadding gvaudienceSelector";	
}


if($privacy_source=="ep"){
$dclass="hidden_sb";
$uinohover.=" opacity1v";
}

if($privacy_source=="wu"){
if(isset($wall) AND $uid!=$uidv){
$privacy["listclass"]=get_list_class("customv");
$audienceselector.=' only_wrench';
$dclass="hidden_sb";
$uti=sb_user($uidv);
$privacy["listtooltip"]=$uti['fullname'].' Controls who can see posts on '.$uti['prefix'].' wall';	
}
}
?>