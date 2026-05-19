<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\SkillCategoryEnum;
use Database\Factories\SkillFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'category'])]
class Skill extends Model
{
    /** @use HasFactory<SkillFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'tbl_skills';

    /**
     * Casts de atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'category' => SkillCategoryEnum::class,
        ];
    }

    // =========================================================
    // Relaciones
    // =========================================================

    /**
     * Estudiantes que tienen esta habilidad.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'tbl_student_skills')
            ->using(StudentSkill::class)
            ->withTimestamps();
    }
}
