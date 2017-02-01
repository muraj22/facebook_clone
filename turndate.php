February 13 at 8:14pm
2012-02-22 13:55:55

February 22 at 1:55pm

hasta aca<br>
<?php
function turndate($date){$date=tod($date);

list($date,$hours)=explode(' ',$date);
list($year,$month,$day)=explode('-',$date);
list($hour,$mins,$secs)=explode(':',$hours);

$month_arr = array (
    "01" => 'January',
    "02" => 'February',
    "03" => 'March',
    "04" => 'April',
    "05" => 'May',
    "06" => 'June',
    "07" => 'July',
    "08" => 'August',
    "09" => 'September',
    "10" => 'October',
    "11" => 'November',
    "12" => 'December'
);

$hour_arr = array (
    "13" => '1',
    "14" => '2',
    "15" => '3',
    "16" => '4',
    "17" => '5',
    "18" => '6',
    "19" => '7',
    "20" => '8',
    "21" => '9',
    "22" => '10',
    "23" => '11',
    "24" => '12'
);

$pm='am';
if(isset($hour_arr[$hour])){$hour=$hour_arr[$hour]; $pm='pm'; if($hour=='12'){$pm='am';}}

$output=$month_arr[$month].' '.$day.' at '.$hour.':'.$mins.$pm;
return $output;
}

$date='2012-02-22 13:55:55';
$formatted_date=turndate($date);
echo $formatted_date;
?>