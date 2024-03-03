<?php

namespace App\Interfaces;

interface UrlRepositoryInterface 
{
    public function getAllUrls();
    public function createUrl(array $urlDetails);
    public function getUrlByCode($code);
    public function deleteUrl($id);
}