<?php
$media_qf=" AND (
(id='$uid' OR ((media.albumn='Profile Pictures' OR media.albumn='Wall Photos' OR media.albumn='Videos' OR media.albumn='Photos') AND (privacy='0')
OR (privacy='1' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=media.id AND e.id2='$uid')>0  )

OR (length(media.privacy)>1 AND (SELECT COUNT(*) FROM lists_members as a WHERE a.id=media.id AND a.id2='$uid' AND FIND_IN_SET(a.listid,REPLACE(privacy,'l',''))>0)>0)
OR (length(media.privacy)>1 AND (SELECT COUNT(*) FROM friends as a WHERE a.id=media.id AND a.id2='$uid' AND FIND_IN_SET(a.id2,REPLACE(privacy,'p',''))>0)>0)

OR (privacy='4' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=media.id AND FIND_IN_SET(e.id2,'$uid_friends_comma_me')>0)>0)) OR ((media.albumn!='Profile Pictures' AND media.albumn!='Wall Photos' AND media.albumn!='Videos' AND media.albumn!='Photos') AND (SELECT COUNT(*) FROM albums as b WHERE b.sbid=media.albumid AND (b.privacy='0')
OR (b.privacy='1' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=media.id AND e.id2='$uid')>0  )

OR (length(b.privacy)>1 AND (SELECT COUNT(*) FROM lists_members as a WHERE a.id=media.id AND a.id2='$uid' AND FIND_IN_SET(a.listid,REPLACE(privacy,'l',''))>0)>0)
OR (length(b.privacy)>1 AND (SELECT COUNT(*) FROM friends as a WHERE a.id=media.id AND a.id2='$uid' AND FIND_IN_SET(a.id2,REPLACE(privacy,'p',''))>0)>0)
                                                                                          
OR (b.privacy='4' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=media.id AND FIND_IN_SET(e.id2,'$uid_friends_comma_me')>0)>0)))

)



AND (

(SELECT COUNT(*) FROM lists_members as e WHERE e.id=media.id AND e.id2='$uid' AND FIND_IN_SET(e.id2,REPLACE(media.privacyh,'l',''))>0)=0 AND 
(SELECT COUNT(*) FROM friends as e WHERE e.id=media.id AND e.id2='$uid' AND FIND_IN_SET(e.id2,REPLACE(media.privacyh,'p',''))>0)=0 


)

AND (media.albumn!='Photos')

OR (
media.albumn='Photos'
AND (media.id='$uid' OR media.id2='$uid')
OR(
media.privacy='1' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=media.id2 AND e.id2='$uid')>0
)

)

)
"; //media type query' a pesar de que estes en la lista negra igual podes verte si sos una etiqueta, lo mismo con que tus amigos pueden verte si sos una etiqueta

//the finish part has to do with photos posted to walls (whose privacy is set to friends of the id2 in which the photo was posted)


$aq_builder="(id='$uid' OR (privacy='0')
OR (privacy='1' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=dt.id AND e.id2='$uid')>0  )

OR (length(privacy)>1 AND (SELECT COUNT(*) FROM lists_members as a WHERE a.id=dt.id AND a.id2='$uid' AND FIND_IN_SET(a.listid,REPLACE(privacy,'l',''))>0)>0)
OR (length(privacy)>1 AND (SELECT COUNT(*) FROM friends as a WHERE a.id=dt.id AND a.id2='$uid' AND FIND_IN_SET(a.id2,REPLACE(privacy,'p',''))>0)>0)

OR (privacy='4' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=dt.id AND FIND_IN_SET(e.id2,'$uid_friends_comma_me')>0)>0)

)


AND (

(SELECT COUNT(*) FROM lists_members as e WHERE e.id=dt.id AND e.id2='$uid' AND FIND_IN_SET(e.id2,REPLACE(privacyh,'l',''))>0)=0 AND 
(SELECT COUNT(*) FROM friends as e WHERE e.id=dt.id AND e.id2='$uid' AND FIND_IN_SET(e.id2,REPLACE(privacyh,'p',''))>0)=0 


)";

$a_qf=" AND ".$aq_builder;

$status_qfa=" AND
(
";

$status_qfb="
)";
//query without much workarounds - selects whenever there is true privacy set on this same table being queried

$status_qf=$status_qfa.$aq_builder."
OR (
dt.id!=dt.id2
AND (dt.id='$uid' OR dt.id2='$uid')
OR(
dt.privacy='1' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=dt.id2 AND e.id2='$uid')>0
)

)".$status_qfb;

$tags_qf=" AND ( dt.id3='$uid' OR ( (SELECT COUNT(*) FROM media WHERE media.id=dt.id AND media.sbid=dt.photoid".$media_qf.") OR (SELECT COUNT(*) FROM friends as e WHERE e.id='$uid' AND e.id2=dt.id3 AND e.id2!=dt.id AND confirmed='y')>0 ) )";

//does not override privacy selection in case friends was not the target privacy, yet if one is a friend of someone tagged in the photo he/she can see the photo

//

$ltypev="";
$extra_param="";

if(!function_exists("return_bq")){
function return_bq($ltypev,$extra_param=""){
global $uidv;
global $uid;
global $uidv_friends;
global $b_qf;
global $uid_friends_comma_me;



if($ltypev=="friendsv"){ //special query type that allows for using friends out of register and therefore order by first name
$ltypev="friends";
$schunk="'$uidv'";
$wuid=$uidv;
}
else{
$schunk=$ltypev.".id";	
$wuid=$uid;
}


$b_qf=" AND(id='$wuid' OR(
(SELECT COUNT(*) FROM privacy_last as st WHERE st.id=$schunk AND st.type='$ltypev' AND st.category='$extra_param')=0

OR (
SELECT COUNT(*) FROM privacy_last as st WHERE st.id=$schunk AND st.type='$ltypev' AND st.category='$extra_param' AND (st.privacy='0')
OR (length(st.privacy)>1 AND (SELECT COUNT(*) FROM lists_members as a WHERE a.id=$schunk AND a.id2='$uid' AND FIND_IN_SET(a.listid,REPLACE(st.privacy,'l',''))>0)>0) 
OR (length(st.privacy)>1 AND (SELECT COUNT(*) FROM friends as a WHERE a.id=$schunk AND a.id2='$uid' AND FIND_IN_SET(a.id2,REPLACE(st.privacy,'p',''))>0)>0)

OR (st.privacy='1' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=$schunk AND e.id2='$uid')>0  )
OR (st.privacy='4' AND (SELECT COUNT(*) FROM friends as e WHERE e.id=$schunk AND FIND_IN_SET(e.id2,'$uid_friends_comma_me')>0)>0)

AND (

(SELECT COUNT(*) FROM lists_members as e WHERE e.id=$schunk AND e.id2='$uid' AND FIND_IN_SET(e.id2,REPLACE(st.privacyh,'l',''))>0)=0 AND 
(SELECT COUNT(*) FROM friends as e WHERE e.id=$schunk AND e.id2='$uid' AND FIND_IN_SET(e.id2,REPLACE(st.privacyh,'p',''))>0)=0 


)

)

) 

)";


//estos estan dentros de un OR adentro de el and


return $b_qf;
	
}

}

$qf=return_bq($ltypev,$extra_param);
//just a simple example, use this to return the string when this type of privacy filtering is wanted - example hometown or current city, or languages
//query selecting from the last privacy set over that option for this user\'s story


//unrelated to privacy queries start

if(!function_exists("return_bqv")){
function return_bqv($ltypev,$extra_param){
global $uid;
global $clist;

$b_qfv="id='$uid' AND (SELECT COUNT(*) FROM privacy_last as st WHERE st.id=".$ltypev.".id AND st.type='".$ltypev."' AND st.category='$extra_param' AND length(st.privacy)>1 AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(st.privacy,'l',''))>0)>0)>0";

return $b_qfv;
}
}
?>