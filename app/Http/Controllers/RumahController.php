<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Rumah = Rumah::all()->toArray();
        // dd($Rumah);
        return inertia('TableRumah', compact('Rumah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('TambahRumah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'nomor_rumah.required' => 'Nomor RUmah wajib diisi.',
            'alamat_rumah.required' => 'Alamat rumah wajib di isi.',
       ];
       
        // Validasi data
        $validated = $request->validate([
            'nomor_rumah' => 'required',
            'alamat_rumah' => 'required',
        ], $message);

        // dd(Rumah::all());
        Rumah::create($validated);
        return redirect()->route('TambahRumah')->with('success', 'Data rumah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rumah::find($id)->delete();
        return redirect()->route('DataRumah');
    }
}
