<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Inertia\Inertia; 
use App\Interfaces\UrlRepositoryInterface;
use Illuminate\Support\Facades\Redirect;

class UrlController extends Controller
{
    private UrlRepositoryInterface $urlRepository;

    public function __construct(UrlRepositoryInterface $urlRepository) 
    {
        $this->urlRepository = $urlRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return Inertia::render('index', [
            'urls' => $this->urlRepository->getAllUrls()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
    {
        $urlDetails = $request->only([
            'url'
        ]);
        $result = $this->urlRepository->createUrl($urlDetails);
        return Redirect::route('url.index');
        // return to_route('url.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $code)
    {
        $url = $this->urlRepository->getUrlByCode($code);
        return redirect($url->original_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $urlId = $request->route('url');
        $this->urlRepository->deleteUrl($urlId);

        // return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
