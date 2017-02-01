<?php  
ignore_user_abort(true);
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}
$thephoto=$photoid;
?>
<?php
if(isset($thetable)){
$uidvtt=$thetable;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
				
	switch($action){
		case 'delete':
		
			$uidjsv=$cuidvjs;
			$uidjs=$cuidvjs;
			
			if($dcase=='1'){
				if($uidjsv==""){
			mysql_query("delete from tags where photoid='$thephoto' AND id3='$uidjsv' AND label2='$label'");
				}
			else{mysql_query("delete from tags where photoid='$thephoto' AND id3='$uidjsv'");}
					if(strlen($uidjs)>40 && $uidjs!=$uidvtt){
						if($uidjsv==""){mysql_query("delete from tags where photoid='$thephoto' AND id3='$uidjsv' AND label2='$label'");}
						else{mysql_query("delete from tags where photoid='$thephoto' AND id3='$uidjsv'");}
					}	
			}
			else if($dcase=='2'){
			if($uidjsv==""){
			mysql_query("delete from tags where photoid='$thephoto' AND id2='$uid' AND id3='$uidjsv' AND label2='$label'");
				}
			else{mysql_query("delete from tags where photoid='$thephoto' AND id2='$uid' AND id3='$uidjsv'");}
					if(strlen($uidjs)>40 && $uidjs!=$uidvtt){
						if($uidjsv==""){mysql_query("delete from tags where photoid='$thephoto' AND id2='$uid' AND id3='$uidjsv' AND label2='$label'");}
						else{mysql_query("delete from tags where photoid='$thephoto' AND id2='$uid' AND id3='$uidjsv'");}
					}
			}
			else if($dcase=='3'){
						if($uidjsv==""){
			mysql_query("delete from tags where photoid='$thephoto' AND id3='$uid' AND label2='$label'");
				}
			else{mysql_query("delete from tags where photoid='$thephoto' AND id3='$uid'");}
					if(strlen($uidjs)>40 && $uidjs!=$uidvtt){
						if($uidjsv==""){mysql_query("delete from tags where photoid='$thephoto' AND id3='$uid' AND label2='$label'");}
						else{mysql_query("delete from tags where photoid='$thephoto' AND id3='$uid'");}
					}	
			}
		break;
		
		case 'save':
    	$uidjs=$cuidvjs;
		unset($c);
		if($uidjs!=""){ //label case - not user..
		while($m=mysql_fetch_array($r)){
		$dflag=$m['flag'];	
		$did=$m['id'];
		}
		/*
        if($c>0){
		if($_POST['flag']=="r" && $dflag=="w" && ($did==$uid || $uidjs==$uid)){ //o soy photo owner o soy esa misma persona
		mysql_query("UPDATE tags SET left='$left',top='$top',width='$width',height='$height',datetimep=UNIX_TIMESTAMP(),id2='$uid'");	
		}
		else{$throw_error='t';}
         */
		} //label case not user ends
		
		if(!isset($c) || (isset($c) && $c==0)){
			
		$r=mysql_query("SELECT * FROM tags WHERE photoid='$photoid' AND visibility='v'");
		$c=mysql_num_rows($r);
		if($c>=50){echo'e10{}'; exit();}
    
            $r=mysql_query("SELECT * FROM tags WHERE photoid='$photoid' AND id3='$cuidvjs' AND id3!='' AND visibility='v'");
            $c=mysql_num_rows($r);
            if($c>0){exit();}
            
			$dea=mysql_query("INSERT INTO tags(`width2`,`height2`,`top2`,`left2`,`photoid`,`pin`,`id3`,`datetimep`,`label2`,`id`,`thephotom`,`thephotol`,`albumid`,`id2`,`flag`,`visibility`) values (
				".$width.",
				".$height.",
				".$top.",
				".$left.",
				'".$photoid."',
                '".$pin."',
				'".$cuidvjs."',
				UNIX_TIMESTAMP(),
				'".$label."',
				'".$thetable."',
				'".$thephotom."',
				'".$thephotol."',
				'".$albumid."',
				'".$uid."',
				'".$flag."',
				'v'
			)") or die();
		}
	 
		if(isset($throw_error)){
		mysql_close($con);
		exit();	
		}
		//	echo mysql_insert_id();			
		break;
	
	}
}
include("end.php");
?>