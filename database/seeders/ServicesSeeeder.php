<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeeder extends Seeder
{
    public function run()
    {
        Service::query()->create([
            'name' => 'Tuns păr scurt',
            'duration' => 25,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Tuns păr mediu',
            'duration' => 35,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Tuns păr lung',
            'duration' => 50,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Aranjat de zi',
            'duration' => 20,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Aranjat de gală',
            'duration' => 50,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Aranjat de mireasă',
            'duration' => 90,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Spălat',
            'duration' => 25,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Tratament de hidratare',
            'duration' => 40,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Tratament de anticădere',
            'duration' => 30,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Tratament de regenerare',
            'duration' => 35,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Vopsit păr scurt',
            'duration' => 60,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Vopsit păr mediu',
            'duration' => 90,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Vopsit păr lung',
            'duration' => 120,
            'department_id' => 1
        ]);

        Service::query()->create([
            'name' => 'Tratament facial de hidratare',
            'duration' => 60,
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Tratament facial de antiîmbătrânire',
            'duration' => 120,
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Tratament facial pentru curățarea imperfecțiunilor',
            'duration' => 90,
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Pensat',
            'duration' => 20,
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Machiaj de zi',
            'duration' => 60,
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Machiaj de gală',
            'duration' => 90,
            'department_id' => 2
        ]);

        Service::query()->create([
            'name' => 'Manichiura clasica',
            'duration' => 30,
            'department_id' => 3
        ]);

        Service::query()->create([
            'name' => 'Manichiura cu gel',
            'duration' => 90,
            'department_id' => 3
        ]);

        Service::query()->create([
            'name' => 'Manichiura semipermanentă',
            'duration' => 60,
            'department_id' => 3
        ]);

        Service::query()->create([
            'name' => 'Pedichiura clasică',
            'duration' => 30,
            'department_id' => 4
        ]);

        Service::query()->create([
            'name' => 'Pedichiura medicinală',
            'duration' => 60,
            'department_id' => 4
        ]);

        Service::query()->create([
            'name' => 'Pedichiura cu gel',
            'duration' => 50,
            'department_id' => 4
        ]);

        Service::query()->create([
            'name' => 'Pedichiura semipermanentă',
            'duration' => 40,
            'department_id' => 4
        ]);
    }
}
