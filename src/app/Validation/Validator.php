<?php

namespace App\Validation;

use Illuminate\Validation\Validator as BaseValidator;

class Validator extends BaseValidator
{
    public function validateInteger($attribute, $value, $parameters = [])
    {
        // strictオプションで型に厳密に判定するように拡張
        return in_array('strict', $parameters, true)
            ? is_int($value)
            : parent::validateInteger($attribute, $value);
    }

    public function validateBoolena($attribute, $value, $parameters = [])
    {
        // strictオプションで型に厳密に判定するように拡張
        return in_array('strict', $parameters, true)
            ? is_bool($value)
            : parent::validateBoolean($attribute, $value);
    }
}
