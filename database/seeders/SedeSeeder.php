<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sedes = [
            'Rectoria',
            'Zapopan',
            'Orizaba',
        ];

        foreach($sedes as $s){
            Sede::create([
                'name' => $s
            ]);
        }
    }
}
