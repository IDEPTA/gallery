<?php

namespace App\Http\Controllers\Auth;
use App\Services\Auth\Service;
use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
