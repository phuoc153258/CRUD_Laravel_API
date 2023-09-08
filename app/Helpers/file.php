<?php

if (!function_exists('getFileType')) {
    function getFileType($file_type)
    {
        return explode("/", $file_type)[0];
    }
}
