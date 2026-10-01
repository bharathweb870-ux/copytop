<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SectorController extends Controller
{
    public function index()
    {
        return view('sector.index');
    }

    public function show(string $sector)
    {
        return view('sector.show', compact('sector'));
    }
}
