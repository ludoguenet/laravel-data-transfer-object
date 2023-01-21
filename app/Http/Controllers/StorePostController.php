<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;

class StorePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(
        StorePostRequest $request,
    ) {
        //
    }
}
