<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Traits\EnumHelper;

/**
 * SkillCategoryEnum
 *
 * Categorías que agrupan las habilidades/skills del catálogo.
 * Usadas en la tabla `skills` (columna `category`) y en el SkillsSeeder.
 */
enum SkillCategoryEnum: string
{
    use EnumHelper;

    case FRONTEND   = 'frontend';
    case BACKEND    = 'backend';
    case MOBILE     = 'mobile';
    case DESIGN     = 'diseno';
    case DEVOPS     = 'devops';
    case DATABASE   = 'base_de_datos';
    case QA         = 'qa';
    case SOFT_SKILL = 'habilidad_blanda';
    case OTHER      = 'otro';

    /**
     * Label personalizado para la UI.
     */
    public function customLabel(): string
    {
        return match ($this) {
            self::FRONTEND   => 'Frontend',
            self::BACKEND    => 'Backend',
            self::MOBILE     => 'Mobile',
            self::DESIGN     => 'Diseño',
            self::DEVOPS     => 'DevOps',
            self::DATABASE   => 'Base de Datos',
            self::QA         => 'QA / Testing',
            self::SOFT_SKILL => 'Habilidad Blanda',
            self::OTHER      => 'Otro',
        };
    }
}
