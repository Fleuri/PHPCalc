<?php

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

echo $res;
$history[] = "{$arg1}{$op}{$arg2}={$res}";

