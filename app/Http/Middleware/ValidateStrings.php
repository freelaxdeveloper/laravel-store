<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TransformsRequest as Middleware;

class ValidateStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $only = [
        'title',
        'meta_description',
        'description',
    ];

    protected function transform($key, $value)
    {
        if (!in_array($key, $this->only, true)) {
            return $value;
        }
        return $value;
    }

}
