<?php

namespace App\Helpers;

class ColumnMapper
{
    public static function get(array $row, array $possibleNames)
    {
        foreach ($possibleNames as $name) {
            foreach ($row as $key => $value) {
                if (strtolower(trim($key)) == strtolower(trim($name))) {
                    return $value;
                }
            }
        }

        return null;
    }
}