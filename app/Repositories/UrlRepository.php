<?php

namespace App\Repositories;

use App\Interfaces\UrlRepositoryInterface;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlRepository implements UrlRepositoryInterface 
{
    public function getAllUrls() 
    {
        return Url::orderBy('id', 'DESC')->get();
    }

    public function createUrl(array $urlDetails) 
    {
        $code = Str::random(5);
        $origin = env('URL', 'http://127.0.0.1:8000/');
        $shortened_url =  $origin . $code;
        return Url::create([
            'code' => $code,
            'original_url' => $urlDetails["url"],
            'shortened_url' =>  $shortened_url
        ]);
    }

    public function getUrlByCode($code) 
    {
        return Url::where('code', $code)->first();
    }

    public function deleteUrl($urlId) 
    {
        Url::destroy($urlId);
    }
}