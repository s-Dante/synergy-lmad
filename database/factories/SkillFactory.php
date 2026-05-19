<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\SkillCategoryEnum;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Nombres de skills de ejemplo agrupados por categoría,
     * usados para generar datos dummy variados en tests.
     */
    private static array $skillsByCategory = [
        SkillCategoryEnum::FRONTEND->value   => ['HTML', 'CSS', 'JavaScript', 'TypeScript', 'React', 'Vue.js', 'Angular', 'Tailwind CSS'],
        SkillCategoryEnum::BACKEND->value    => ['PHP', 'Laravel', 'Node.js', 'Python', 'Java', 'C#', 'Go', 'REST APIs'],
        SkillCategoryEnum::MOBILE->value     => ['Flutter', 'React Native', 'Swift', 'Kotlin', 'Dart'],
        SkillCategoryEnum::DESIGN->value     => ['Figma', 'Adobe XD', 'Photoshop', 'Illustrator', 'UI/UX'],
        SkillCategoryEnum::DEVOPS->value     => ['Docker', 'Git', 'GitHub Actions', 'Linux', 'AWS', 'CI/CD'],
        SkillCategoryEnum::DATABASE->value   => ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite'],
        SkillCategoryEnum::QA->value         => ['PHPUnit', 'Jest', 'Selenium', 'Testing Manual'],
        SkillCategoryEnum::SOFT_SKILL->value => ['Trabajo en Equipo', 'Comunicación', 'Liderazgo', 'Scrum', 'Agile'],
    ];

    /**
     * Estado por defecto.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = fake()->randomElement(SkillCategoryEnum::values());
        $names    = self::$skillsByCategory[$category] ?? ['Habilidad General'];

        return [
            'name'     => fake()->unique()->randomElement($names),
            'category' => $category,
        ];
    }

    // =========================================================
    // States por categoría
    // =========================================================

    public function frontend(): static
    {
        return $this->state(fn (array $attributes) => [
            'category' => SkillCategoryEnum::FRONTEND->value,
            'name'     => fake()->unique()->randomElement(self::$skillsByCategory[SkillCategoryEnum::FRONTEND->value]),
        ]);
    }

    public function backend(): static
    {
        return $this->state(fn (array $attributes) => [
            'category' => SkillCategoryEnum::BACKEND->value,
            'name'     => fake()->unique()->randomElement(self::$skillsByCategory[SkillCategoryEnum::BACKEND->value]),
        ]);
    }

    public function design(): static
    {
        return $this->state(fn (array $attributes) => [
            'category' => SkillCategoryEnum::DESIGN->value,
            'name'     => fake()->unique()->randomElement(self::$skillsByCategory[SkillCategoryEnum::DESIGN->value]),
        ]);
    }
}
