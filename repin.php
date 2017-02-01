<?php  
/*
 * if(!isset($_GET['getl'])){
	ignore_user_abort(true);
    //if(isset($_POST['fr']) && $_POST['fr']=="nf"){
    header('HTTP/1.0 204 No Content');
    header('Content-Length: 0',true);
    header('Content-Type: text/html',true);
    flush();
}
 * */
include("start.php");
?>
<?php
if(isset($_GET['getl'])){
    $whatisit=$_POST['whatisit'];

    include("chatupd.php");
    $uidv=$_POST['uidv'];

    $photoid=$_POST['photoid'];

    $x=$_POST['x'];

    $result2 = mysql_query("SELECT * FROM repins WHERE likeid='$photoid' AND what='$whatisit'");
    while($ms2 = mysql_fetch_array($result2))
    {
        $count2=$ms2['count'];
    }

    $ltype=$whatisit;
    $wp_table='like';
    $likeid=$photoid;
    $owner_c=$uidv;

    $ds='block';
    $pdlv='0';

    include("stories/with_plugin.php");


    if($with!=""){
        $with=$with.' <span class="lthis">repinned this.</span>'; 
    }

    echo $with;

    echo'{}';

    $result10 = mysql_query("SELECT * FROM repinw WHERE likeid='$photoid' AND what='$whatisit' AND id2='$uid' AND repins='1'");
    $nb=mysql_num_rows($result10);

    if($nb>0){
        $like='unpin';	
    }
    else{
        $like='like';		
    }

    echo $like;

    echo'{}'.$tr;

    mysql_close($con);
    exit();	
}


$uidv=$_POST['uidv'];
$whatisit=$_POST['whatisit'];

if(isset($_POST['albumid'])){
    $albumid=$_POST['albumid'];	
}
else{$albumid='';}

if(isset($_POST['lpid'])){
    $lpid=$_POST['lpid'];

    $c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c2 FROM repinw WHERE likeid='$lpid' AND what='$whatisit' AND id2='$uid'"));
    $c2=$c2['c2'];
    
    $r5=mysql_query("SELECT * FROM repins WHERE likeid='$lpid' AND what='$whatisit'");
    $c5=mysql_num_rows($r5);

    if($c5==0){
        exit();
        mysql_query("INSERT INTO repins (id, likeid count, what, datetimep)
VALUES ('$uidv','$lpid','0','$whatisit',UNIX_TIMESTAMP())");
    }
    

    $r=mysql_query("SELECT * FROM repins WHERE likeid='$lpid' AND what='$whatisit'");
    while($m=mysql_fetch_array($r)){
        $cb=$m['count'];
        $cb=$cb+1;
        mysql_query("UPDATE repins SET count='$cb' WHERE likeid='$lpid' AND what='$whatisit'");	
    }

    if($c2==0){
        mysql_query("INSERT INTO repinw(id,id2,repins,likeid,albumid,what,datetimep)
VALUES ('$uidv','$uid','1','$lpid','$albumid','$whatisit',UNIX_TIMESTAMP())"); //count en esta tabla al reverendo pedo, like se hace una ves sola!
    }
    else{
        mysql_query("UPDATE repinw SET repins='1' WHERE likeid='$lpid' AND what='$whatisit'");	
    }
?>
<?php
    $ltype=$whatisit;
    $wp_table='repin';
    $likeid=$lpid;
    $owner_c=$uidv;

    include("stories/with_plugin.php");

    if($ltype=="comment"){
        echo $with;
    }
    else if($with!=""){
        echo $with.' repinned this.'; 
    }
    else{
        echo $with;	
    }

} //end if isset $_post['lpid'];

include("end.php");
?>