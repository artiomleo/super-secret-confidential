<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeeder extends Seeder
{
    public function run()
    {
        Service::query()->create([
            'name' => 'Machiaj',
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Masaj facial',
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Curățire facială',
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Plan de îngrijire a feței',
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Consultare cu dermatolog',
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Consultare cu chirurg plastician',
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Coafor',
            'department_id' => 3
        ]);

        Service::query()->create([
            'name' => 'Manichiură',
            'department_id' => 3
        ]);

        Service::query()->create([
            'name' => 'Pedichiură',
            'department_id' => 3
        ]);
    }
}
