<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $query = request('q', '');
        return view('search.index', compact('query'));
    }
}
