<?php

namespace App\Enums;


enum ErrorEnums: string
{

    case Success = '1';
    case Error = '0';


    /**
     * Get all the enum Gender as an associative array.
     *
     * @return array
     */
    public static function Genders(): array
    {
        return [
            self::Success->name => '1',
            self::Error->name => '2',
        ];
    }
}
