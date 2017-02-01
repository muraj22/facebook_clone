<?php
include("start.php");

echo'
<div class="mam"><div>Create a list of people so you can easily share with them and see their updates in one place.</div><table class="uiInfoTable mvl noBorder" role="presentation"><tbody><tr class="dataRow"><th class="label" style="width:80px;"><label for="createListname">List Name:</label></th><td class="data"><input class="inputtext" maxlength="80" data-maxlen="140" name="listname" id="createListname" type="text"></td></tr><tr class="dataRow"><th class="label" style="width:80px;"><label for="createListMembers">Members:</label></th><td class="data"><div class="clearfix uiTokenizer uiInlineTokenizer" id="sbFriendListTokenizer" style="width:320px; min-height: 90px;"><div class="tokenarea " id="ugjyner1"></div><div class="uiTypeahead" id="ugjyner2"><div class="wrap"><input autocomplete="off" class="hiddenInput" type="hidden"><div class="innerWrap">



<div style="width:292px;margin:0;margin-bottom:-1px;margin-left:0px;min-height:20px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext dcphogc displaynoneimportant" data-ac_position="fixed" data-ac_padding="padding:3px;padding-left:1px;margin-bottom:-2px;" data-ac_enable="create_list" data-ac_liwidth="198" data-ac_inputw="224" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_placeholder="Who would you like to add to this list?"></div>

</div></div></div></div></td></tr></tbody></table></div>
';
include("end.php");
?>