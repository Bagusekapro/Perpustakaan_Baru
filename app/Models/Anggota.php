<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Anggota extends Model
{

     use HasFactory;

    protected $fillable = ['Nama', 'Email', 'Telp'];

    public function Peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

}
