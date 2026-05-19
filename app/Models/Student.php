<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\RamaEnum;
use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'name',
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'matricula',
    'email',
    'correo_contacto',
    'telefono_contacto',
    'avatar',
    'cv',
    'portafolio',
    'red_social',
    'rama',
])]
class Student extends Model
{
    /** @use HasFactory<StudentFactory> */
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'tbl_students';

    /**
     * Casts de atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'red_social' => 'array',
            'rama'       => RamaEnum::class,
        ];
    }

    // =========================================================
    // Relaciones
    // =========================================================

    /**
     * Habilidades del estudiante.
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'tbl_student_skills')
            ->using(StudentSkill::class)
            ->withTimestamps();
    }

    // =========================================================
    // Helpers
    // =========================================================

    /**
     * Retorna el nombre completo del estudiante.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}";
    }
}
