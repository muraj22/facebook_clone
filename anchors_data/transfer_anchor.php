<?php
if(isset($from_header) || $uid==$uidv){
$duid=$uid;
$h='/composer/transfer.php'; //pure elegance
$data_d_title='Transfer';
unset($from_header);
}
else{
$duid=$uidv;
$h='/transfers/'.$uti['username'];
$data_d_title='Transfer<a href="/transfers/'.$uti['username'].'" class="_8-5" data-t_text="See Full Transfer History" data-t_position="left"></a>';
}
$sechov='';
$sechov.=' href="'.$h.'" data-d_okay="Send" data-d_width="447" data-d_title=\''.$data_d_title.'\' data-uidv="'.$duid.'" data-d_l_fjax="/composer/compose.php?uidv='.$uidv.'&transfer=t" data-d_l_a_custom_f="msg_response" data-d_l_wrap="t" data-is-composer="t" data-is-transfer="t" data-d_cancel="Cancel" data-d_cancel_function="close_dialog" data-d_overlay="white" data-d_okay_function="custom" data-d_okay_function_custom="fjax" data-d_fjax="/write_messagem.php" data-d_leave_loading="show_loading" data-d_specific="msg_dialog" data-a_form="._20y" data-a_custom_f="set_msg_response" data-a_starts="is_msg_empty" data-dil_a_id="transfer_message" data-a_abort="set_msg_response"
';
?>