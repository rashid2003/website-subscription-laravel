<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Models\Subscriber;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;


#[OpenApi\PathItem]
class SubscriberController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    #[OpenApi\Response(factory: \App\OpenApi\Responses\StoreSubscriberResponse::class)]
    #[OpenApi\Parameters(factory: \App\OpenApi\Parameters\StoreSubscriberParameters::class)]
    public function store(StoreSubscriberRequest $request)
    {
        $name = request('name');
        $email = request('email');
        $website_id = request('website_id');
        $subscriber = Subscriber::create([
            'name' => $name,
            'email' => $email,
            'website_id' => $website_id,
        ]);
        return response()->json(['success' => 'Successfully subscribered.'], 201);
    }

}


