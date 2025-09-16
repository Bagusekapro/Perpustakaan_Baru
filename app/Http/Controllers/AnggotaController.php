<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Anggotas = Anggota::all();
        return view('Anggotas.index', compact('Anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Anggotas.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Nama' => 'required',
        'Email' => 'required',
        'Telp' => 'required|string'
    ]);
    
    // Membersihkan nomor telepon agar hanya menyimpan angka
    $validatedData['Telp'] = preg_replace('/[^0-9]/', '', $request->    Telp);

    Anggota::create($validatedData);

    return redirect()->route('Anggota.index')->with('success', 'Anggota Berhasil Ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Anggota $Anggota)
    {
        return view('Anggotas.show', compact('Anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */ 
    public function edit(Anggota $Anggota)
    {
        return view('Anggotas.edit', compact('Anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $Anggota)
    {
        $validateData = $request->validate([
            'Nama'=>'required',
            'Email'=>'required',
            'Telp' => 'required|string'
        ]); 

        $Anggota->update($validateData);
        return redirect()->route('Anggota.index')->with('success', 'Anggota Berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $Anggota)
    {
        $Anggota->delete();
        return redirect()->route('Anggota.index')->with('success','Anggota Berhasil Dihapus');
    }
}
