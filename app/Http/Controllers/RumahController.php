<?php

namespace App\Http\Controllers;

use App\Http\Resources\RumahResource;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumah = Rumah::all();
        $Rumah = RumahResource::collection($rumah)->toArray(request());
        // return response()->json($Rumah);
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
        // dd($request->all());

        $message = [
            'nomor_rumah.required' => 'Nomor RUmah wajib diisi.',
            'alamat_rumah.required' => 'Alamat rumah wajib di isi.',
        ];

        // Validasi data
        $validated = $request->validate([
            'nomor_rumah' => 'required',
            'foto_rumah' => 'required',
            'alamat_rumah' => 'required',
        ], $message);

        $foto = $validated['foto_rumah'];
        $extension = $foto->getClientOriginalExtension();
        $nama = 'Rumah_' . $validated['nomor_rumah'] .'.' . $extension;

        $foto->move('FotoRumah', $nama);
        $validated['foto_rumah'] = $nama;
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
    public function edit($id)
    {
        $user = Rumah::findOrFail($id);

        return Inertia::render('EditRumah', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Rumah::findOrFail($id);
        $user->update($request->only('nomor_rumah', 'alamat_rumah'));
        return redirect()->route('users.edit', $user->id)->with('success', 'User updated successfully');
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
