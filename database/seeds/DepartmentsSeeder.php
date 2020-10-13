<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name' => 'Comercio',
                'description' => 'Departamento de Comercio',
            ],
            [
                'name' => 'Informática',
                'description' => 'Departamento de Informática',
            ],
            [
                'name' => 'Sociales',
                'description' => 'Departamento de Sociales',
            ],
            [
                'name' => 'Turismo',
                'description' => 'Departamento de Turismo',
            ],
            [
                'name' => 'Matemáticas',
                'description' => 'Departamento de Matemáticas',
            ],
            [
                'name' => 'Construcción Civil',
                'description' => 'Departamento de Construcción Civil',
            ],
        ]);
    }
}
