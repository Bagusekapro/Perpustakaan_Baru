<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Bukus = Buku::all();
        return view('Bukus.index', compact('Bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validateData= $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Tahun_Terbit' => 'required|numeric',
            'Stok' => 'required|numeric',
        ]);

        Buku::create($validateData);
        return redirect()->route('Buku.index')->with('success', 'Buku Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $Buku)
    {
        return view('Buku.show',compact('Buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $Buku)
    {
        return view('Bukus.edit', compact('Buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $Buku)
    {
        $validateData= $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Tahun_Terbit' => 'required',
            'Stok' => 'required|numeric',
        ]);

        $Buku->update($validateData);
        return redirect()->route('Buku.index')->with('success', 'Buku Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $Buku)
    {
        $Buku->delete();
        return redirect()->route('Buku.index')->with('success', 'Buku Berhasil Dihapus');
    }
}
