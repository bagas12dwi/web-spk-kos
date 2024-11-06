<?php

namespace App\Http\Controllers;

use App\Models\Range;
use App\Http\Requests\StoreRangeRequest;
use App\Http\Requests\UpdateRangeRequest;
use Illuminate\Http\Request;

class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ranges = Range::all();
        return view('dev.range.add-range', [
            'title' => 'Tambah Range',
            'ranges' => $ranges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'lower_limit' => 'required',
            'upper_limit' => 'required'
        ]);

        Range::create($validatedData);

        return redirect()->route('range.index')->with('success', 'Range berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Range $range)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Range $range)
    {
        $range = Range::findOrFail($range->id);

        return view('dev.range.edit-range', compact('range'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Range $range)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'lower_limit' => 'required',
            'upper_limit' => 'required'
        ]);

        Range::where('id', $range->id)->update($validatedData);

        return redirect()->route('range.index')->with('success', 'Range berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Range $range)
    {
        //
    }
}
