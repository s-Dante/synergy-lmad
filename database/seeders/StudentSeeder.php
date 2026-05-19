<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Student;
use Illuminate\Database\Seeder;

/**
 * StudentSeeder — solo se ejecuta en entornos de desarrollo.
 *
 * Crea estudiantes ficticios con habilidades asignadas aleatoriamente.
 * Requiere que SkillsSeeder haya corrido antes.
 */
class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $skills = Skill::all();

        // 20 estudiantes con perfil básico
        Student::factory(20)->create()->each(function (Student $student) use ($skills) {
            // Asignar entre 2 y 6 habilidades aleatorias a cada estudiante
            $student->skills()->attach(
                $skills->random(rand(2, min(6, $skills->count())))->pluck('id')->toArray()
            );
        });

        // 5 estudiantes con perfil completo (para mostrar en demos del frontend)
        Student::factory(5)->perfilCompleto()->create()->each(function (Student $student) use ($skills) {
            $student->skills()->attach(
                $skills->random(rand(4, min(8, $skills->count())))->pluck('id')->toArray()
            );
        });

        // 3 estudiantes sin información de contacto (caso borde)
        Student::factory(3)->sinContacto()->create();
    }
}
