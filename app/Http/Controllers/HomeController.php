<?php

namespace App\Http\Controllers;

use App\Models\Range;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'title' => 'Home'
        ]);
    }
}
