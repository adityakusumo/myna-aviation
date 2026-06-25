<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MynaAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama'    => 'Aditya Kusumo',
            'gender'  => 'L',
            'namaclub'=> '-',
            'role'    => 'admin',
            'email'   => 'aadityakusumo@gmail.com',
            'password'=> Hash::make('Infoglobal@2019'),
        ]);

        $this->command->info('Admin account created: aadityakusumo@gmail.com');
    }
}
