<?php

namespace App\Http\Controllers;

use App\Models\Range;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $range_jarak = Range::where('category', 'Jarak')->get()->toArray();
        $range_ukuran = Range::where('category', 'Kamar')->get()->toArray();
        $range_fasilitas = Range::where('category', 'Fasilitas')->get()->toArray();
        $range_harga = Range::where('category', 'Harga')->get()->toArray();

        return view('welcome', [
            'range_jarak' => $range_jarak,
            'range_ukuran' => $range_ukuran,
            'range_fasilitas' => $range_fasilitas,
            'range_harga' => $range_harga,
        ]);
    }
}
