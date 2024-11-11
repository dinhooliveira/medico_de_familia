<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosCivisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados_civis = [
            'Solteiro(a)',
            'Casado(a)',
            'Divorciado(a)',
            'Viúvo(a)',
            'Separado(a)',
            'União Estável',
        ];

        foreach ($estados_civis as $estado_civil) {
            DB::table('estados_civis')->insert([
                'nome' => $estado_civil,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
