<?php

function time_conversion($time) {
    return date("H:i:s", strtotime($time));
}

$data = "07:05:45PM";

echo time_conversion($data);