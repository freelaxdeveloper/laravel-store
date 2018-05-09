<?php

function lang(string $key, array $replace = [], string $locale = null): string
{
    $locale = App::getLocale();
    if ($locale == 'ru') {
        return preg_replace('/^.+\.(.*)/i', '$1', $key);
    }
    return app('translator')->getFromJson($key, $replace, $locale);
}