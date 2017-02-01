<?php  
include("start.php");
?>
<?php
if(isset($_REQUEST['thetable'])){

$uidvtt=$_REQUEST['thetable'];
if(isset($_REQUEST['thephoto'])){$thephoto=$_REQUEST['thephoto'];}
if(isset($_REQUEST['thephotom'])){$thephotom=$_REQUEST['thephotom'];}
if(isset($_REQUEST['thephotol'])){$thephotol=$_REQUEST['thephotol'];}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

	switch($_REQUEST['action']){
		
		case 'list':
			$tags = array();
			$query = mysql_query("SELECT * FROM tags WHERE photoid='$thephoto'");
			while($ms = mysql_fetch_array($query)){
if($ms['photoid']==$thephoto){
			$tags[] = array("id"=>$ms['id'],
								"label"=>$ms['label2'],
								"width"=>$ms['width2'],
								"height"=>$ms['height2'],
								"top"=>$ms['top2'],
								"left"=>$ms['left2'],
								"cuidvjsv"=>$ms['cuidvjs']);
			}
}
			echo json_encode($tags);
		break;
	
		case 'delete':
		mysql_query("delete from tags where sbid = ".$_REQUEST['id']);
		break;
		
		case 'save':
	
	$r=mysql_query("SELECT * FROM tags WHERE photoid='$thephoto' AND (visibility='v' OR visibility='h')");
	$c=mysql_num_rows($r);
	if($c>=50){echo 'e10{}'; exit();}
	
		$uidjs=$_REQUEST['cuidvjs'];
            
            $r=mysql_query("SELECT * FROM tags WHERE photoid='$thephoto' AND id3='$uidjs' AND id3!='' AND visibility='v'");
            $c=mysql_num_rows($r);
            if($c>0){exit();}
            
			mysql_query("INSERT INTO tags(`width2`,`height2`,`top2`,`left2`,`photoid`,`pin`,`id3`,`datetimep`,`label2`,`id`,`thephotom`,`thephotol`,`albumid`,`id2`,`flag`,`visibility`) values (
				".$_REQUEST['width'].",
				".$_REQUEST['height'].",
				".$_REQUEST['top'].",
				".$_REQUEST['left'].",
				'".$thephoto."',
                '".$pin."',
				'".$_REQUEST['cuidvjs']."',
				UNIX_TIMESTAMP(),
				'".$_REQUEST['label']."',
				'".$_REQUEST['thetable']."',
				'".$_REQUEST['thephotom']."',
				'".$_REQUEST['thephotol']."',
				'".$_REQUEST['albumid']."',
				'".$uid."',
				'r',
				'".$_REQUEST['uploader_vis']."'
			)") or die();
			
		
			echo mysql_insert_id();			
		break;
	
	}
}
include("end.php");
?>