<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Token;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Token>
 */
class TokenFactory extends Factory
{
    /**
     * Token válido por defecto (no usado, expira en 24h).
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token'      => Str::random(64),
            'expires_at' => now()->addHours(24),
            'used'       => false,
        ];
    }

    // =========================================================
    // States
    // =========================================================

    /**
     * Token ya utilizado.
     */
    public function used(): static
    {
        return $this->state(fn (array $attributes) => [
            'used' => true,
        ]);
    }

    /**
     * Token expirado.
     */
    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => now()->subDay(),
        ]);
    }

    /**
     * Token sin fecha de expiración (permanente).
     */
    public function permanent(): static
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => null,
        ]);
    }
}
