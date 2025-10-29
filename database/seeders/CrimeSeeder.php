<?php

namespace Database\Seeders;

use App\Models\Crime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crime::factory()->count(10)->create();
    }
}