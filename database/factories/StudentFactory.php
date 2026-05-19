<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\RamaEnum;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Estado por defecto: estudiante mexicano con datos realistas.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker           = fake('es_MX');
        $nombre          = $faker->firstName();
        $apellidoPaterno = $faker->lastName();
        $apellidoMaterno = $faker->lastName();

        return [
            'name'               => "{$nombre} {$apellidoPaterno} {$apellidoMaterno}",
            'nombre'             => $nombre,
            'apellido_paterno'   => $apellidoPaterno,
            'apellido_materno'   => $apellidoMaterno,
            'matricula'          => strtoupper($faker->bothify('??######')),
            'email'              => $faker->unique()->safeEmail(),
            'correo_contacto'    => $faker->optional(0.7)->safeEmail(),
            'telefono_contacto'  => $faker->optional(0.6)->phoneNumber(),
            'avatar'             => null,
            'cv'                 => null,
            'portafolio'         => $faker->optional(0.5)->url(),
            'red_social'         => $this->fakeRedSocial($faker->userName()),
            'rama'               => $faker->randomElement(RamaEnum::values()),
        ];
    }

    // =========================================================
    // States
    // =========================================================

    /**
     * Estudiante sin información de contacto adicional (solo email institucional).
     */
    public function sinContacto(): static
    {
        return $this->state(fn (array $attributes) => [
            'correo_contacto'   => null,
            'telefono_contacto' => null,
            'red_social'        => null,
            'portafolio'        => null,
        ]);
    }

    /**
     * Estudiante con perfil completo (todas las redes sociales y archivos).
     */
    public function perfilCompleto(): static
    {
        $faker    = fake('es_MX');
        $username = $faker->userName();

        return $this->state(fn (array $attributes) => [
            'correo_contacto'   => $faker->safeEmail(),
            'telefono_contacto' => $faker->phoneNumber(),
            'portafolio'        => $faker->url(),
            'red_social'        => [
                'linkedin' => "https://linkedin.com/in/{$username}",
                'github'   => "https://github.com/{$username}",
                'behance'  => "https://behance.net/{$username}",
            ],
        ]);
    }

    // =========================================================
    // Helpers privados
    // =========================================================

    /**
     * Genera un array de redes sociales con presencia aleatoria.
     */
    private function fakeRedSocial(string $username): array
    {
        $redes = [];

        if (fake()->boolean(75)) {
            $redes['linkedin'] = "https://linkedin.com/in/{$username}";
        }

        if (fake()->boolean(80)) {
            $redes['github'] = "https://github.com/{$username}";
        }

        if (fake()->boolean(30)) {
            $redes['behance'] = "https://behance.net/{$username}";
        }

        return $redes;
    }
}
