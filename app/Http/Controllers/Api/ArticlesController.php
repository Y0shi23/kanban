<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Listing;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller {
    
    public function index() {
        $articles = Listing::all();
        return $articles;
    }
}