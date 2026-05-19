<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TokenFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['token', 'expires_at', 'used'])]
class Token extends Model
{
    /** @use HasFactory<TokenFactory> */
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'tbl_tokens';

    /**
     * Casts de atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'used'       => 'boolean',
        ];
    }

    // =========================================================
    // Helpers
    // =========================================================

    /**
     * Indica si el token ya expiró.
     */
    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }

    /**
     * Indica si el token es válido (no usado y no expirado).
     */
    public function isValid(): bool
    {
        return ! $this->used && ! $this->isExpired();
    }
}
