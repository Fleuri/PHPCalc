<?php
exec('rm testfile.txt');
$x = -pi();
$arr = array();
while ($x <= pi()) {
    $arr[count($arr)] = sin($x);
    $x += 0.1;
    }
    foreach($arr as $value) {
        file_put_contents("testfile.txt", $value, FILE_APPEND);
        file_put_contents("testfile.txt", "\n", FILE_APPEND);
    };
    exec('gnuplot -e "filename=\'testfile.txt\'" foo.plg');
    exec('chmod a+r output.png');
