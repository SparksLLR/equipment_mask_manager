<?php

function check_mask_to_regex($equipment_type_mask, $serial_number)
{
    if (preg_match(mask_to_regex($equipment_type_mask), $serial_number)) {
        return true;
    } else {
        return false;
    }
}

function mask_to_regex($equipment_type_mask)
{
    $transform = array(
        'N' => '[0-9]',
        'A' => '[A-Z]',
        'a' => '[a-z]',
        'X' => '[A-Z0-9]',
        'Z' => '[-_@]'
    );

    $regex = "";
    for ($i = 0, $len = strlen($equipment_type_mask); $i < $len; $i++) {
        $ch = $equipment_type_mask[$i];

        if (isset($transform[$ch])) {
            $regex .= $transform[$ch];
        }
    }

    return '/^' . $regex . '$/';
}