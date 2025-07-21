<?php

namespace App\Http\Requests\Ideas;

use Illuminate\Foundation\Http\FormRequest;

class CreateIdeaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'required:string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
