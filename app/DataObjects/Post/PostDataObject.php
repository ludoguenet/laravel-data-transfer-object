<?php

declare(strict_types=1);

namespace App\DataObjects\Post;

use App\DataObjects\DataObjectContract;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostDataObject implements DataObjectContract
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly Carbon $publishedAt,
    ){}

    public static function make(
        FormRequest $request,
    ): self {
        return new self(
            title: strval($request->get(key: 'title')),
            content: strval($request->get(key: 'content')),
            publishedAt: new Carbon(
                time: strval($request->get('published_at')),
            ),
        );
    }
}
