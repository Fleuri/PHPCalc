<?php
// AUTHOR: Lauri Suomalainen, 013791364
{
$arg1 = $_GET["arg1"];
$arg2 = $_GET["arg2"];
$op = $_GET["op"];
if( $op=='+') {
    $res = $arg1+$arg2;
}
elseif( $op=='-') {
    $res = $arg1-$arg2;
}
elseif( $op=='*') {
    $res = $arg1*$arg2;
}
elseif( $op=='/') {
    $res = $arg1/$arg2;
}

#$tmp = "{$arg1}{$op}{$arg2}={$res}";
echo $res;
#$_SESSION['history'][count($_SESSION['history'])] = $tmp;
}
