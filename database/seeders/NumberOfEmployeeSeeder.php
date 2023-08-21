<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NumberOfEmployee;

class NumberOfEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NumberOfEmployee::factory()
            ->count(5)
            ->create();
    }
}
