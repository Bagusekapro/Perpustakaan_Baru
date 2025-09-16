<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Buku extends Model
{

    use HasFactory;

     protected $fillable = ['Judul', 'Penulis', 'Tahun_Terbit', 'Stok'];

     public function Peminjaman()
     {
        return $this->hasMany(Peminjaman::class);
     }
}
