<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        /**
         * @var User $user
         */
        User::query()->create([
            'name' => 'Denisa',
            'email' => 'denisa@mail.com',
            'role' => 'admin',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        User::query()->create([
            'name' => 'Andrei Bolocan',
            'email' => 'client@mail.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        User::query()->create([
            'name' => 'Viorica Galben',
            'email' => 'viorica@mail.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        User::query()->create([
            'name' => 'Vasile Petrescu',
            'email' => 'vasile@mail.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);
    }
}
