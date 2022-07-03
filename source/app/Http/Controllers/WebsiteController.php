<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;


#[OpenApi\PathItem]
class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    #[OpenApi\Response(factory: \App\OpenApi\Responses\ListWebsitesResponse::class)]
    public function index()
    {
        $websites = Website::all();
        return response()->json($websites, 200);
    }
}
