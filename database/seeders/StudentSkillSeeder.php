<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * StudentSkillSeeder
 *
 * Las relaciones student-skill se asignan directamente en StudentSeeder
 * usando $student->skills()->attach(...), por lo que este seeder no
 * necesita lógica adicional.
 *
 * Se mantiene por si en el futuro se requiere lógica específica
 * para la tabla pivot (e.g. niveles de habilidad, fechas de adquisición).
 */
class StudentSkillSeeder extends Seeder
{
    public function run(): void
    {
        // Ver StudentSeeder — las relaciones se crean ahí.
    }
}
