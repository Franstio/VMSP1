<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EscortController extends Controller
{
    //
    public function index()
    {
        return view('checked.escorting-in');
    }
}
