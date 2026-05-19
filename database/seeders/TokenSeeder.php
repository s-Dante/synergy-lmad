<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Seeder;

/**
 * TokenSeeder — solo se ejecuta en entornos de desarrollo.
 *
 * Genera tokens de prueba en distintos estados para poder
 * probar los flujos de registro e invitación.
 */
class TokenSeeder extends Seeder
{
    public function run(): void
    {
        // Tokens válidos listos para usar
        Token::factory(5)->create();

        // Tokens ya utilizados
        Token::factory(3)->used()->create();

        // Tokens expirados
        Token::factory(3)->expired()->create();

        // Tokens permanentes (sin expiración)
        Token::factory(2)->permanent()->create();
    }
}
