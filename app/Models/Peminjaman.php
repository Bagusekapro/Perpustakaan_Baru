<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Anggota;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['Nama_Anggota', 'Judul_Buku', 'Tanggal_Pinjam', 'Tanggal_Pengembalian','Status'];

    public function Buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function Anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
