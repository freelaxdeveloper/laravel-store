<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TransformsRequest as Middleware;

class ValidateStrings extends Middleware
{
    /**
     * Поля, которые нужно фильтровать от всякой нечисти
     *
     * @var array
     */
    protected $only = [
        'title',
        'name',
        'meta_description',
        'description',
    ];

    protected function transform($key, $value)
    {
        if (!in_array($key, $this->only, true)) {
            return $value;
        }
        return \Filter::input_text($value);
    }

}
