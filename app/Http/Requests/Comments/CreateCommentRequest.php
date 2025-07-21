<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
