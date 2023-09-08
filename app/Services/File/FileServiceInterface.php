<?php

namespace App\Services\File;

interface FileServiceInterface
{
    public function upload($file, $type): string;

    public function delete($file): string;
}
