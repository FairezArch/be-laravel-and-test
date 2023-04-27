<?php

function plus_minus($arr) {
    $count = count($arr);
    $positive = 0;
    $negative = 0;
    $zero = 0;
    
    foreach($arr as $num){
        if($num > 0){
            $positive++;
        }else if($num < 0){
            $negative++;
        }else{
            $zero++;
        }
    }
    
    echo number_format($positive/$count, 6)."\n";
    echo number_format($negative/$count, 6)."\n";
    echo number_format($zero/$count, 6)."\n";
}

$data = [1,1,0,-1,-1];
plus_minus($data);