<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quote.index');
    }
}
