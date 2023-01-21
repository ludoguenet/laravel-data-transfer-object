<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:90'
            ],
            'message' => [
                'required',
                'string',
                'max:150'
            ],
            'birthday' => [
                'required',
                'date',
            ],
        ];
    }
}
