<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Http\Requests\StoreKostRequest;
use App\Http\Requests\UpdateKostRequest;
use Illuminate\Http\Request;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kosts = Kost::all();
        return view('dev.add-kost', [
            'title' => 'List Kost',
            'kosts' => $kosts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'facility' => 'required|array', // Validasi sebagai array
            'facility.*' => 'string', // Setiap elemen dalam array harus berupa string
            'distance' => 'required',
            'price' => 'required',
            'wide' => 'required'
        ]);

        $validatedData['address'] = $request->address;
        $validatedData['map'] = $request->map;
        if ($request->file('img_path')) {
            $validatedData['img_path'] = $request->file('img_path')->store('kost');
        }
        $validatedData['facility_count'] = count($validatedData['facility']);
        $validatedData['facility'] = implode(', ', $validatedData['facility']);


        Kost::create($validatedData);

        return redirect()->route('kost.index')->with('success', 'Kost berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kost $kost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kost $kost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKostRequest $request, Kost $kost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kost $kost)
    {
        //
    }
}
