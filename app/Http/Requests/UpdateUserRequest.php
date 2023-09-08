<?php

namespace App\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    use HttpResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'max:50',
            'email' => 'max:50',
            'password' => 'max:50',
            'avatar' => 'max:50'
        ];
    }
}
