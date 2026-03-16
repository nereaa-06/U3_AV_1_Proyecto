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
        // Crear aulas
        $aula1 = \App\Models\Aula::firstOrCreate(['nombre' => 'Aula 101 - Informatica']);
        $aula2 = \App\Models\Aula::firstOrCreate(['nombre' => 'Aula 102 - Matematicas']);
    
        // Crear grupos
        $grupo1 = \App\Models\Grupo::firstOrCreate(['nombre' => '1º DAW']);
        $grupo2 = \App\Models\Grupo::firstOrCreate(['nombre' => '2º ASIR']);
        

        // Crear usuarios (profesores)
        $victor = \App\Models\User::firstOrCreate([
            'email' => 'victor@centro.com',
        ], [
            'name' => 'Victor',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::firstOrCreate([
            'email' => 'manuel@centro.com',
        ], [
            'name' => 'Manuel',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::firstOrCreate([
            'email' => 'rafa@centro.com',
        ], [
            'name' => 'Rafa',
            'password' => bcrypt('12345678'),
        ]);


        // Crear horarios
        \App\Models\Horario::firstOrCreate([
            'user_id' => $victor->id,
            'aula_id' => $aula1->id,
            'grupo_id' => $grupo1->id,
            'dia_semana' => 1,
            'hora_orden' => 1,
        ]);

        \App\Models\Horario::firstOrCreate([
            'user_id' => $victor->id,
            'aula_id' => $aula2->id,
            'grupo_id' => $grupo1->id,
            'dia_semana' => 1,
            'hora_orden' => 2,
        ]);

    }


}
