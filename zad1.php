<?php

$dane = file_get_contents('http://loripsum.net/api');
$array = explode(' ',$dane);
print_r($array);
?>