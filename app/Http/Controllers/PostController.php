<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __invoke(
        Request $request,
    ): View {
        /**
         * @var string|null $sortBy
         */
        $sortBy = $request->sortBy;

        /**
         * @var string|null $direction
         */
        $direction = $request->direction;

        $posts = Post::query()
            ->withCount(
                relations: [
                    'likes',
                    'comments',
            ])
            ->filters(
                sortBy: $sortBy,
                direction: $direction,
            )
            ->latest()
            ->paginate(25);

        return view(
            view: 'posts.index',
            data: ['posts' => $posts],
        );
    }
}
