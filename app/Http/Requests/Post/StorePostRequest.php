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

    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:90'
            ],
            'content' => [
                'required',
                'string',
                'max:150'
            ],
            'published_at' => [
                'required',
                'date',
            ],
        ];
    }
}
