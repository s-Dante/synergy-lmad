<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Traits\EnumHelper;

/**
 * RamaEnum
 *
 * Representa las ramas o áreas de especialización de los estudiantes LMAD.
 *
 * TODO: Actualizar los casos con los valores reales de la carrera.
 *       Recuerda también actualizar el SkillsSeeder si las categorías
 *       de habilidades deben estar alineadas con las ramas.
 */
enum RamaEnum: string
{
    use EnumHelper;
    
    case PROGRAMACION = 'programacion';
    case EDICION_DE_VIDEO = 'edicion_de_video';
    case ARTE_2D = 'arte_2D';
    case ARTE_3D = 'arte_3D';
   

    /**
     * Label personalizado para la UI.
     */
    public function customLabel(): string
    {
        return match ($this) {
            self::PROGRAMACION => 'Programación', 
            self::EDICION_DE_VIDEO => 'Edición de Video', 
            self::ARTE_2D => 'Arte 2D', 
            self::ARTE_3D => 'Arte 3D',  
        };
    }
}
