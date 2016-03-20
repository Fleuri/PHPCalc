<?php
exec('rm testfile.txt'); // No cheating!
$x = -pi();
$arr = array();
while ($x <= pi()) {
    $arr[count($arr)] = sin($x);
    $x += 0.1;
    }
    foreach($arr as $value) { //Create a file containing the values
        file_put_contents("testfile.txt", $value, FILE_APPEND);
        file_put_contents("testfile.txt", "\n", FILE_APPEND);
    };
    exec('gnuplot -e "filename=\'testfile.txt\'" foo.plg'); //Pass the value file along with the configuration file 'foo.plg'.
    exec('chmod a+r output.png'); //Some environments do not set read-privileges for the picture. This is done just in case.
