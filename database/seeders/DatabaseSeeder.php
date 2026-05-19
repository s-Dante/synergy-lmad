<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeders que siempre corren en cualquier entorno.
     * Deben ser idempotentes (usar updateOrCreate / firstOrCreate).
     *
     * @var array<int, class-string<Seeder>>
     */
    private array $productionSeeders = [
        SkillsSeeder::class,
    ];

    /**
     * Seeders que SOLO corren en entornos de desarrollo/local.
     * Generan datos dummy con Faker para pruebas de UI y funcionalidad.
     *
     * @var array<int, class-string<Seeder>>
     */
    private array $developmentSeeders = [
        UserSeeder::class,
        TokenSeeder::class,
        StudentSeeder::class,
        StudentSkillSeeder::class,
    ];

    /**
     * Poblar la base de datos.
     */
    public function run(): void
    {
        // Seeders de producción: siempre se ejecutan
        $this->call($this->productionSeeders);

        // Seeders de desarrollo: solo en local/development/testing
        if (app()->environment('local', 'development', 'testing')) {
            $this->command->warn('Entorno de desarrollo detectado — sembrando datos dummy...');
            $this->call($this->developmentSeeders);
        }
    }
}
