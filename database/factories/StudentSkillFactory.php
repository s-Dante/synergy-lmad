<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Skill;
use App\Models\Student;
use App\Models\StudentSkill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentSkill>
 *
 * Nota: Este factory es útil para pruebas directas del modelo pivot.
 * En seeders y tests de integración, es preferible usar:
 *   $student->skills()->attach($skill->id)
 * o bien:
 *   Student::factory()->hasAttached(Skill::factory()->count(3))->create()
 */
class StudentSkillFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'skill_id'   => Skill::factory(),
        ];
    }
}
