<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\SkillCategoryEnum;
use App\Models\Skill;
use Illuminate\Database\Seeder;

/**
 * SkillsSeeder
 *
 * Siempre se ejecuta (producción y desarrollo).
 * Usa updateOrCreate para ser idempotente: se puede correr varias veces
 * sin duplicar datos.
 */
class SkillsSeeder extends Seeder
{
    /**
     * Catálogo base de habilidades agrupadas por categoría.
     *
     * @var array<string, array<int, string>>
     */
    private array $skills = [
        SkillCategoryEnum::FRONTEND->value => [
            'HTML5',
            'CSS3',
            'JavaScript',
            'TypeScript',
            'React',
            'Vue.js',
            'Angular',
            'Tailwind CSS',
            'Bootstrap',
            'SASS/SCSS',
            'Next.js',
            'Nuxt.js',
        ],
        SkillCategoryEnum::BACKEND->value => [
            'PHP',
            'Laravel',
            'Node.js',
            'Express.js',
            'Python',
            'Django',
            'FastAPI',
            'Java',
            'Spring Boot',
            'C#',
            '.NET',
            'Go',
            'REST APIs',
            'GraphQL',
        ],
        SkillCategoryEnum::MOBILE->value => [
            'Flutter',
            'Dart',
            'React Native',
            'Swift',
            'Kotlin',
            'Android',
            'iOS',
        ],
        SkillCategoryEnum::DESIGN->value => [
            'Figma',
            'Adobe XD',
            'Adobe Photoshop',
            'Adobe Illustrator',
            'UI/UX Design',
            'Prototipado',
            'Diseño Responsivo',
            'Canva',
        ],
        SkillCategoryEnum::DEVOPS->value => [
            'Git',
            'GitHub',
            'GitLab',
            'Docker',
            'Docker Compose',
            'CI/CD',
            'Linux',
            'AWS',
            'Google Cloud',
            'GitHub Actions',
        ],
        SkillCategoryEnum::DATABASE->value => [
            'MySQL',
            'PostgreSQL',
            'SQLite',
            'MongoDB',
            'Redis',
            'Firebase',
            'Diseño de Bases de Datos',
        ],
        SkillCategoryEnum::QA->value => [
            'PHPUnit',
            'Jest',
            'Cypress',
            'Selenium',
            'Testing Manual',
            'Postman',
        ],
        SkillCategoryEnum::SOFT_SKILL->value => [
            'Trabajo en Equipo',
            'Comunicación Efectiva',
            'Liderazgo',
            'Resolución de Problemas',
            'Adaptabilidad',
            'Gestión del Tiempo',
            'Scrum',
            'Agile',
        ],
        SkillCategoryEnum::OTHER->value => [
            'Excel Avanzado',
            'Power BI',
            'Inglés',
        ],
    ];

    public function run(): void
    {
        $this->command->info('Sembrando catálogo de habilidades...');

        foreach ($this->skills as $category => $names) {
            foreach ($names as $name) {
                Skill::updateOrCreate(
                    ['name' => $name],
                    ['category' => $category],
                );
            }
        }

        $this->command->info('✓ Habilidades sembradas correctamente.');
    }
}
