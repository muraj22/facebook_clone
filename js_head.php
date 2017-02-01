<?php
echo'
<script type="text/javascript">
function fjax_url(sarr){
sarrv="?";
var xv=0;
$(sarr).each(function(){
if(xv>0){sarrv+="&amp;";}
sarrv+=$(this).attr("id")+"="+$(this).val();
xv++;
});
return sarrv;
}
</script>
';
?>