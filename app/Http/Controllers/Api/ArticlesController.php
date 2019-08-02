<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Listing;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller {
    
    public function index() {
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
            
        return $articles;
    }
}