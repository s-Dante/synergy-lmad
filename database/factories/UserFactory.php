<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Contraseña compartida entre instancias del factory para mayor rendimiento.
     */
    protected static ?string $password;

    /**
     * Estado por defecto: usuario de tipo empresa.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'           => fake('es_MX')->userName(),
            'email'              => fake()->unique()->safeEmail(),
            'email_verified_at'  => now(),
            'password'           => static::$password ??= Hash::make('password'),
            'role'               => UserRoleEnum::COMPANY->value,
            'remember_token'     => Str::random(10),
        ];
    }

    // =========================================================
    // States
    // =========================================================

    /**
     * Usuario administrador.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRoleEnum::ADMIN->value,
        ]);
    }

    /**
     * Usuario empresa.
     */
    public function company(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRoleEnum::COMPANY->value,
        ]);
    }

    /**
     * Usuario estudiante.
     */
    public function student(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRoleEnum::STUDENT->value,
        ]);
    }

    /**
     * Email sin verificar.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
