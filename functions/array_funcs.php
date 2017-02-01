<?php
if(!function_exists("array_funcs")){

function array_funcs(){
return false;	
}

function sort_highest_amount($mutual){
uksort($mutual, function ($a, $b) use ($mutual) {
    $valDiff = count($mutual[$b]) - count($mutual[$a]);

    if ($valDiff != 0) {
        return $valDiff;
    } else {
        return strcmp($b, $a);
    }
});
return $mutual;
}


function shuffle_assoc($array)
{

        $shuffled_array = array();

        $shuffled_keys = array_keys($array);
        shuffle($shuffled_keys);

        foreach ( $shuffled_keys AS $shuffled_key ) {

            $shuffled_array[  $shuffled_key  ] = $array[  $shuffled_key  ];

        } 

        return $shuffled_array;
}


}
?>