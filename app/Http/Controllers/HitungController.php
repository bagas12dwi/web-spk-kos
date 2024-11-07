<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Range;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function index()
    {
        $range_jarak = Range::where('category', 'Jarak')->get()->toArray();
        $range_ukuran = Range::where('category', 'Kamar')->get()->toArray();
        $range_fasilitas = Range::where('category', 'Fasilitas')->get()->toArray();
        $range_harga = Range::where('category', 'Harga')->get()->toArray();

        return view('menu.hitung.index', [
            'title' => 'Prediksi Harga',
            'range_jarak' => $range_jarak,
            'range_ukuran' => $range_ukuran,
            'range_fasilitas' => $range_fasilitas,
            'range_harga' => $range_harga,
        ]);
    }

    public function caridata($total)
    {
        $batasatas = $total * (1 + 0.1);
        $batasbawah = $total * (1 - 0.1);
        $kost = Kost::where('price', '<=', $batasatas)
            ->where('price', '>=', $batasbawah)
            ->get();
        return response()->json($kost);
    }

    public function detail($id)
    {
        $kost = Kost::where('id', $id)->first();

        return view('menu.hitung.detail', [
            'title' => $kost->name,
            'kost' => $kost
        ]);
    }
}
