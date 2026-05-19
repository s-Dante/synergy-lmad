<?php

declare(strict_types=1);

namespace App\Enums\Traits;

/**
 * Trait EnumHelper
 *
 * Proporciona métodos utilitarios para Backed Enums de PHP.
 * - label(): Nombre legible para UI.
 * - options(): Array [value => label] listo para <select> en Blade.
 * - values(): Array plano de valores para validación.
 */
trait EnumHelper
{
    /**
     * Retorna un label legible para la UI.
     * Si el enum define su propio método customLabel(), lo usa.
     * De lo contrario convierte snake_case a Title Case.
     */
    public function label(): string
    {
        return match (true) {
            method_exists($this, 'customLabel') => $this->customLabel(),
            default => ucwords(str_replace('_', ' ', $this->value)),
        };
    }

    /**
     * Retorna un array [value => label] listo para usar en selects de Blade.
     *
     * Ejemplo de uso en Blade:
     *   <select>
     *     @foreach(UserRoleEnum::options() as $value => $label)
     *       <option value="{{ $value }}">{{ $label }}</option>
     *     @endforeach
     *   </select>
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }

        return $options;
    }

    /**
     * Retorna un array plano con los valores del enum.
     * Útil para reglas de validación.
     *
     * Ejemplo:
     *   'role' => ['required', Rule::in(UserRoleEnum::values())]
     *
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
