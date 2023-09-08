<?php

use Illuminate\Support\Str;

if (!function_exists('genarateUUID')) {
    function genarateUUID()
    {
        return Str::uuid()->toString();
    }
}
