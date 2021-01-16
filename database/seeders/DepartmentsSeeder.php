<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    public function run()
    {
        Department::query()->create([
            'name' => 'Coafor',
        ]);

        Department::query()->create([
            'name' => 'Cosmetica',
        ]);

        Department::query()->create([
            'name' => 'Manichiura',
        ]);

        Department::query()->create([
            'name' => 'Pedichiura',
        ]);
    }
}
