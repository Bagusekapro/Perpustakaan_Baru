<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{

   
    
    public function definition(): array
    {
        return [
            'Nama'=>$this->faker->name(),
            'Email'=>$this->faker->unique()->safeEmail(),
            'Telp' =>$this->faker->phoneNumber(),
        ];
    }
}
