<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

trait HttpResponse
{
    protected function success($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error($data = null, $message = null, $code = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'status' => false,
                'message' => 'Invalid infomation',
                'data' => $errors,
            ],
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        ), 422);
    }
}
