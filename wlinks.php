<?php
if(isset($params['left_link_n'])){
$wlinks=array();
$wlinks['news_feed']=1;
$wlinks['message']=2;
$wlinks['events']=3;
$wlinks['find_friends']=4;
$wlinks['close_friends']=5;
$wlinks['family']=6;
$wlinks['photos']=7;
$wlinks['links']=8;
$wlinks['pokes']=9;
$wlinks['notes']=10;
$wlinks['']="none";
if(isset($wlinks[$params['left_link_n']])){
$wlink=$wlinks[$params['left_link_n']];
}
else{
$wlink=$params['left_link_n'];
}
}
else if(isset($params['left_link_w'])){
$wlinks=array();
$wlinks['wall']=1;
$wlinks['info']=2;
$wlinks['friends']=3;
$wlinks['photos']=4;
$wlinks['map']=5;
$wlinks['likes']=6;
$wlinks['subscribers']=7;
$wlinks['subscriptions']=8;
$wlinks['notes']=9;
$wlinks['events']=10;
$wlinks['pins']=11;
if(isset($wlinks[$params['left_link_w']])){
$wlink=$wlinks[$params['left_link_w']];
}
else{
$wlink=$params['left_link_w'];
}
}
?>