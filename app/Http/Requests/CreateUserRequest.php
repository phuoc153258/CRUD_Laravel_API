<?php

namespace App\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|email|min:5|max:50',
            'password' => 'required|string|min:5|max:50',
        ];
    }
}
