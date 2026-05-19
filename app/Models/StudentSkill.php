<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\StudentSkillFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Modelo pivot explícito para la tabla student_skills.
 */
#[Fillable(['student_id', 'skill_id'])]
class StudentSkill extends Pivot
{
    /** @use HasFactory<StudentSkillFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla (requerido al extender Pivot).
     *
     * @var string
     */
    protected $table = 'tbl_student_skills';

    // =========================================================
    // Relaciones
    // =========================================================

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}
