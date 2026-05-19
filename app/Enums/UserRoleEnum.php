<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Traits\EnumHelper;

enum UserRoleEnum: string
{
    use EnumHelper;

    case STUDENT = 'estudiante';
    case COMPANY = 'empresa';
    case ADMIN   = 'admin';

    /**
     * Label personalizado para la UI.
     * Sobreescribe el comportamiento por defecto del trait EnumHelper.
     */
    public function customLabel(): string
    {
        return match ($this) {
            self::STUDENT => 'Estudiante',
            self::COMPANY => 'Empresa',
            self::ADMIN   => 'Administrador',
        };
    }
}
