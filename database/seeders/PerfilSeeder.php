<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perfils')->insert([
            'name' => 'Administrador',
            'name' => 'Gestor',
            'name' => 'Analista',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
