<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('password123'),
        ]);
    }
    
}


