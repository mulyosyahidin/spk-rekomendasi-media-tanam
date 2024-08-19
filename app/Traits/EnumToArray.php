<?php

namespace App\Traits;

/**
 * Trait EnumToArray
 *
 * This trait provides utility methods to convert PHP enums to arrays.
 * It can be used to retrieve enum names, values, and an associative array of values to names.
 */
trait EnumToArray
{
    /**
     * Get an array of enum names.
     *
     * This method returns an array containing the names of all enum cases.
     *
     * @return array An array of enum names.
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Get an array of enum values.
     *
     * This method returns an array containing the values of all enum cases.
     *
     * @return array An array of enum values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get an associative array of enum values to names.
     *
     * This method returns an associative array where the keys are the enum values
     * and the values are the corresponding enum names.
     *
     * @return array An associative array mapping enum values to names.
     */
    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }
}
