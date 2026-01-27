<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentroEducativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Crear aulas 
        $aula1 = \App\Models\Aula::create(['nombre' => 'Aula 101 - Informatica']);
        $aula2 = \App\Models\Aula::create(['nombre' => 'Aula 102 - Matematicas']);
    
        // Crear grupos
        $grupo1 = \App\Models\Grupo::create(['nombre' => '1º DAW']);
        $grupo2 = \App\Models\Grupo::create(['nombre' => '2º ASIR']);
        

        // Crear usuarios (profesores)
        $profe = \App\Models\User::create([
        'name' => 'Profesor Ausente',
        'email' => 'profe@centro.com',
        'password' => bcrypt('12345678'),
        ]);


        // Crear horarios
        \App\Models\Horario::create([
        'user_id' => $profe->id,
        'aula_id' => $aula1->id,
        'grupo_id' => $grupo1->id,
        'dia_semana' => 1, 
        'hora_orden' => 1
        ]);

        \App\Models\Horario::create([
        'user_id' => $profe->id,
        'aula_id' => $aula2->id,
        'grupo_id' => $grupo1->id,
        'dia_semana' => 1,
        'hora_orden' => 2
        ]);
        
    }


}
