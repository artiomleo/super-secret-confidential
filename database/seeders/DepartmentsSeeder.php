<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    public function run()
    {
        Department::query()->create([
            'name' => 'Estetică',
        ]);

        Department::query()->create([
            'name' => 'Consultanță',
        ]);

        Department::query()->create([
            'name' => 'Frumusețe',
        ]);
    }
}
