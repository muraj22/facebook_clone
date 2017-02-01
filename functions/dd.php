<?php

if(!function_exists("dd")){
/*
function dd($start=false,$end,$out_in_array=true){
		$intervalo = date_diff(date_create($start), date_create($end));
        $out = $intervalo->format("years:%Y,months:%M,days:%d,hours:%H,minutes:%i,seconds:%s");
        if(!$out_in_array)
            return $out;
        $a_out = array();     
        $ok=explode(',',$out);
		foreach($ok as $k=>$v){
            $v2=explode(':',$v);
            $a_out[$v2[0]] = $v2[1];
		}
        return $a_out;
}
*/
}

if(!function_exists("dp")){
function dp($start=false,$end,$out_in_array=true){


if(!$start){
$date = date_create();
$start=$date->format('Y-m-d g:ia');
}
else{
$start=tod($start);	
}
$end=tod($end);

$to_time = strtotime($start);
$from_time = strtotime($end);

$intervalo = date_diff(date_create($start), date_create($end));
$out = $intervalo->format("years:%Y,months:%M");
        $ok=explode(',',$out);
		foreach($ok as $k=>$v){
            $v2=explode(':',$v);
            $a_out[$v2[0]] = $v2[1];
		}

$a_out['months']=(($a_out['years'] * 12) + $a_out['months']);
		
$a_out['hours']=round(abs($to_time - $from_time)/60/60,2);
$a_out['days']=round($a_out['hours']/24,2);
$a_out['minutes']=round(abs($to_time - $from_time)/60,2);
$a_out['seconds']=round(abs($to_time - $from_time),2);
        return $a_out;
}
}

?>