<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Peminjamen = Peminjaman::with(['Buku','Anggota'])->get();
        return view('Peminjamen.index', compact('Peminjamen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Bukus= Buku::all();
        $Anggotas = Anggota::all();
        return view('Peminjamen.create', compact('Bukus','Anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'Nama_Anggota' => 'required|string',
            'Judul_Buku' => 'required|string',
            'Tanggal_Pinjam' =>'required|date',
            'Tanggal_Pengembalian' =>'required|date',
            'Status' => 'required|string|in:Dipinjam,Selesai',
        ]);

        Peminjaman::create($data);
        return redirect()->route('Peminjaman.index')->with('success', 'Peminjaman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $Peminjaman)
    {
        return view('Peminjamen.show', compact('Peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $Peminjaman)
    {
        return view('Peminjamen.edit', compact('Peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $Peminjaman)
    {
        $data = $request->validate([
            'Nama_Anggota' => 'required|string',
            'Judul_Buku' => 'required|string',
            'Tanggal_Pinjam' => 'required|date',
            'Tanggal_Pengembalian' => 'required|date',
            'Status' => 'required|string|in:Dipinjam,Selesai',
        ]);

        $Peminjaman->update($data);
        return redirect()->route('Peminjaman.index')->with('success', 'Peminjaman Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $Peminjaman)
    {
        $Peminjaman->delete();
        return redirect()->route('Peminjaman.index')->with('success','Buku Berhasil Dihapus');
    }
}
