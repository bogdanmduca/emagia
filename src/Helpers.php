<?php

if (!function_exists('isLucky')) {
    function isLucky(int $chance)
    {
        $roll = rand(1, 100);
        if ($roll <= $chance)
            return true;
        return false;
    }
}
