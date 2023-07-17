<?php

function check_mask_to_regex($mask, $serial_number)
{
    $regexes = array(
        'XXAAAAAXAA' => '/^[A-Z0-9]{2}[A-Z]{4}[A-Z0-9][A-Z]{2}$/',
        'NXXAAXZXaa' => '/^\d[A-Z0-9]{2}[A-Z]{2}[-_@][A-Z0-9][a-z]{2}$/',
        'NXXAAXZXXX' => '/^\d[A-Z0-9]{2}[A-Z]{2}[-_@][A-Z0-9]{3}$/',
    );

    foreach ($regexes as $key => $regex) {
        if ($key == $mask) {
            if (preg_match($regexes[$key], $serial_number)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
