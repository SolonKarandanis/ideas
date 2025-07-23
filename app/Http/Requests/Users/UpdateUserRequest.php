<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        $userId=(int)$this->route('id');
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'bio' => ['nullable', 'string','min:1','max:255'],
            'image'=>['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
