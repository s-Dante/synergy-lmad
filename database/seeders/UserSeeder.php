<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * UserSeeder — solo se ejecuta en entornos de desarrollo.
 *
 * Crea un admin y una empresa de prueba con credenciales conocidas,
 * además de N empresas ficticias con Faker.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin de prueba con credenciales fijas
        User::updateOrCreate(
            ['email' => 'admin@synergy.test'],
            [
                'username' => 'admin',
                'password' => bcrypt('password'),
                'role'     => UserRoleEnum::ADMIN->value,
                'email_verified_at' => now(),
            ]
        );

        // Empresa de prueba con credenciales fijas
        User::updateOrCreate(
            ['email' => 'empresa@synergy.test'],
            [
                'username' => 'empresa_test',
                'password' => bcrypt('password'),
                'role'     => UserRoleEnum::COMPANY->value,
                'email_verified_at' => now(),
            ]
        );

        // Empresas ficticias adicionales
        User::factory(10)->company()->create();
    }
}
