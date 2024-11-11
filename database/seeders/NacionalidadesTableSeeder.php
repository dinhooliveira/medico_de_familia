<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nacionalidades = [
            'Brasileira',
            'Americana',
            'Canadense',
            'Argentina',
            'Chilena',
            'Colombiana',
            'Mexicana',
            'Portuguesa',
            'Espanhola',
            'Francesa',
            'Alemã',
            'Italiana',
            'Japonesa',
            'Chinesa',
            'Indiana',
            'Australiana',
            'Sul-Africana',
            'Russa',
            'Sueca',
            'Norueguesa',
        ];

        foreach ($nacionalidades as $nacionalidade) {
            DB::table('nacionalidades')->insert([
                'nome' => $nacionalidade,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
