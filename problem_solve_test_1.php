<?php

function min_max_sum($arr) {
    $n = count($arr);
    $min = $arr[0]; $max = $arr[0]; $sum = $arr[0];
    for($i=1; $i<$n; $i++) {
        $sum += $arr[$i];
        if($arr[$i] < $min) {
            $min = $arr[$i];
        }
        if($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    $minSum = $sum - $max;
    $maxSum = $sum - $min;
    echo $minSum." ".$maxSum;
}

$data = [1,3,5,7,9];
min_max_sum($data);