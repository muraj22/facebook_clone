<?php
echo'
<iframe style="visibility:hidden;position:absolute;left:-250px;" name="likeframe" id="likeframe"></iframe>

<script type="text/javascript">
function keepaliveonline(){
$.ajax({
  async: "false",
  type: "POST",
  url: "/online.php",
  data: { a:\'a\' },
  success: function(response) {
  }
});
setTimeout("keepaliveonline()",300000);	
}
$(document).ready(function(){
keepaliveonline();
});
</script>
';
?>