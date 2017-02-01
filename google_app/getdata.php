<?php
session_start();
    function return_headers ($raw_headers) {
        $headers = explode("
", $raw_headers);
        return $headers;
    }

    $url='https://play.google.com/store/apps/details?id=com.hotornot.app';
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, "http://play.google.com/store/apps/");
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
    $str = curl_exec($ch);
    curl_close($ch);
    
    

$str=str_replace('href="/','href="https://play.google.com/',$str,$count);
$str=str_replace('src="/','src="https://play.google.com/',$str,$count2);
$str=str_replace('42/store','42https://play.google.com/store',$str,$count3);
$str=str_replace('</body>','<script type="text/javascript">$(document).ready(function(){$(".price.buy").eq(0).find("span:last").click();});</script></body>',$str);
echo $str;

?>