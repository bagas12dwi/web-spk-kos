<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        return view('menu.tentang.index', [
            'title' => 'Tentang Kami'
        ]);
    }
}
