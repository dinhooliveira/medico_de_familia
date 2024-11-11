<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            'Acupuntura',
            'Alergologia e Imunologia',
            'Angiologia',
            'Buco Maxilo',
            'Cardiologia',
            'Cirurgia Cardiovascular',
            'Cirurgia de Cabeça e Pescoço',
            'Cirurgia do Aparelho Digestivo',
            'Cirurgia Geral',
            'Cirurgia Pediátrica',
            'Cirurgia Plástica',
            'Cirurgia Torácica',
            'Cirurgia Vascular',
            'Clínica Médica',
            'Coloproctologia',
            'Dermatologia',
            'Endocrinologia e Metabologia',
            'Endoscopia',
            'Gastroenterologia',
            'Genética Médica',
            'Geriatria',
            'Ginecologia e Obstetrícia',
            'Hematologia e Hemoterapia',
            'Homeopatia',
            'Infectologia',
            'Mastologia',
            'Medicina de Emergência',
            'Medicina de Família e Comunidade',
            'Medicina do Trabalho',
            'Medicina de Tráfego',
            'Medicina Esportiva',
            'Medicina Física e Reabilitação',
            'Medicina Intensiva',
            'Medicina Legal e Perícia Médica',
            'Medicina Nuclear',
            'Medicina Preventiva e Social',
            'Nefrologia',
            'Neurocirurgia',
            'Neurologia',
            'Nutrologia',
            'Oftalmologia',
            'Oncologia Clínica',
            'Ortopedia e Traumatologia',
            'Otorrinolaringologia',
            'Patologia',
            'Patologia Clínica/Medicina Laboratorial',
            'Pediatria',
            'Pneumologia',
            'Psiquiatria',
            'Radiologia e Diagnóstico por Imagem',
            'Radioterapia',
            'Reumatologia',
            'Urologia'
        ];

        foreach ($especialidades as $especialidade) {
            DB::table('especialidades')->insert([
                'nome' => $especialidade,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
