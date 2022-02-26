<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'nama' => 'Rivi',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('12345'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::insert([
            'nama' => 'Rivi',
            'username' => 'kasir',
            'role' => 'kasir',
            'password' => Hash::make('12345'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::insert([
            'nama' => 'Rivi',
            'username' => 'manajer',
            'role' => 'manajer',
            'password' => Hash::make('12345'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
