<?php
function truncate($float_number, $precision){
    $factor = 10 ** $precision;
    $truncated_number = floor($float_number * $factor) / $factor;
    return $truncated_number;
}
?>