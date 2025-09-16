<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
   

    public function definition(): array
    {
        return [
            'Judul'=>$this->faker->sentence(3   ),
            'Penulis'=>$this->faker->name(),
            'Tahun_Terbit'=>$this->faker->year(),
            'Stok'=>$this->faker->numberBetween(1,5),
        ];
    }
}
