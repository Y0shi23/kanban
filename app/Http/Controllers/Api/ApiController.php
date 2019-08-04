<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index()
    {
        return new JsonResponse('You are authorized user');
    }
}