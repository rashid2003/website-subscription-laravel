<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;
use App\Observers\PostObserver;
use App\Models\Post;


#[OpenApi\PathItem]
class PostController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    #[OpenApi\Response(factory: \App\OpenApi\Responses\StorePostResponse::class)]
    #[OpenApi\Parameters(factory: \App\OpenApi\Parameters\StorePostParameters::class)]
    public function store(StorePostRequest $request)
    {
        $title = request('title');
        $description = request('description');
        $content = request('content');
        $website_id = request('website_id');
        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'website_id' => $website_id,
        ]);
        return response()->json(['success' => 'Successfully created.'], 201);
    }

}
