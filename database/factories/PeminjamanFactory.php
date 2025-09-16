<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Anggota;
use App\Models\Buku;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{


    public function definition(): array
    {
        $Tanggal_Pinjam = $this->faker->dateTimeBetween('- 1 month', 'now');

        $Tanggal_Pengembalian = $this->faker->dateTimeBetween($Tanggal_Pinjam,'+1 week');

        return [
            'Nama_Anggota' => Anggota::inRandomOrder()->value('Nama'),
            'Judul_Buku' => Buku::inRandomOrder()->value('Judul'),
            'Tanggal_Pinjam' => $Tanggal_Pinjam,
            'Tanggal_Pengembalian' => $Tanggal_Pengembalian,
            'Status' => $this->faker->randomElement(['Dipinjam','Selesai']),
        ];
    }
}
