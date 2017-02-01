<?php
function browser() {
$b='';
$ua=( isset( $_SERVER['HTTP_USER_AGENT'] ) ) ? strtolower( $_SERVER['HTTP_USER_AGENT'] ) : '';

if (stristr($ua, "opera")) 
{
$b='o';
}

elseif (stristr($ua, "msie 4")) 
{
$b='i'; 
}

elseif (stristr($ua, "msie")) 
{
$b='i'; 
}

elseif (stristr($ua, "chrome")) 
{
$b='c'; 
}

elseif ((stristr($ua, "konqueror")) || (stristr($ua, "safari"))) 
{
$b='s'; 
}

elseif (stristr($ua, "gecko")) 
{
$b='f';
}

elseif (stristr($ua, "mozilla/4")) 
{
$b='f';
}

else 
{
$b='u';
}


return $b;

}
?>