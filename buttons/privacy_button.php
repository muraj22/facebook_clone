<?php
include("buttons/privacy_editable.php");
    
$button="";
$button.='<li class="uiListItem" data-pconfig="'.$privacy_configuration.'">
<div id="u_1e_a">
<div class="hidden_sb privacy_wrapper">
<div class="hidden_sb custom_privacy" fjax="/ajax/privacy/simple_save.php?use_val=t" rel="async-post" data-a_formo=\'$(this).parents("li").eq(0);\'></div>';


if($privacy["use_tagsids"]=="t"){
$button.='<input type="hidden" name="ptagsids" value="'.$privacy["tagsids"].'"><input type="hidden" name="ptagsnames" value="'.$privacy["tagsnames"].'">';	
}
if($privacy["use_tagsidsv"]=="t"){
$button.='<input type="hidden" name="ptagsidsv" value="'.$privacy["tagsidsv"].'"><input type="hidden" name="ptagsnamesv" value="'.$privacy["tagsnamesv"].'">';	
}

if($privacy["use_tagsidsv"]=="t" OR $privacy["use_tagsids"]=="t"){
$button.='<input type="hidden" name="iscustom" value="t">';	
}

$button.='<input type="hidden" name="extra_param" value="'.$extra_param.'"><input type="hidden" name="ptype" value="'.$ltypev.'" autocomplete="off"><input type="hidden" name="sbid" value="'.$sbid.'" autocomplete="off"><input type="hidden" name="privacy" value="'.$privacy["privacy"].'" autocomplete="off"><input type="hidden" name="privacyh" value="'.$privacy["privacyh"].'" autocomplete="off"></div><div class="'.$audiencewrapper.' stat_elem widget" id="composerTourAudience"><div class="uiSelector inlineBlock '.$audienceselector.' audienceSelectorNoTruncate dynamicIconSelector uiSelectorRight uiSelectorDynamicLabel uiSelectorDynamicTooltip" id="u_1e_f" data-name="audience[0][value]"><div class="wrap"><a data-nfjax="'.$nfjax.'" '.$data_t.' data-t_reload="f" data-t_text="" class="uiButton '.$uinohover.$use_edit_album.'" href="#" role="button" aria-haspopup="true" aria-expanded="true" data-label="" data-length="30" data-ariaprefix="Post Privacy Setting" rel="toggle"><i class="mrs defaultIcon customimg img '.$privacy["listclass"].'"></i><span class="uiButtonText '.$dclass.'">'.$privacy["listtext"].'</span></a><div class="hidden_sb tooltip_text">'.$privacy["listtooltip"].'</div></div></div></div></div></li>';

unset($extra_param); //this is needed for 0 values, example 0 hometown but privacy wanted to be set
?>