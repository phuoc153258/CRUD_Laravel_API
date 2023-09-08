<?php

namespace App\Http\Controllers;

use App\Services\File\FileService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class FileController extends Controller
{
    use HttpResponse;
    private FileService $fileService;

    public function __construct()
    {
        $this->fileService = new FileService();
    }

    public function create(Request $request)
    {
        try {
            if (!$request->hasFile('file')) return $this->error(null, trans('message.please-select-file'), 400);
            $file = $request->file('file');
            $fileResponse = $this->fileService->upload($file, 'file');
            return $this->success($fileResponse, trans('message.upload-file-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('message.upload-file-failed'), 400);
        }
    }

    public function delete(string $name = null)
    {
        try {
            $fileResponse = $this->fileService->delete($name);
            return $this->success($fileResponse, trans('message.delete-file-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('message.delete-file-failed'), 400);
        }
    }
}
