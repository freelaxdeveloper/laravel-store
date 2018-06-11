<?php

function lang(string $key, array $replace = [], string $locale = null): string
{
    $locale = App::getLocale();
    if ($locale == 'ru') {
        return preg_replace('/^.+\.(.*)/i', '$1', $key);
    }
    return app('translator')->getFromJson($key, $replace, $locale);
}

function price(int $price): int
{
    $discount = Auth::user()->discount ?? 0;

    if ( $discount ) {
        $price -= $price / 100 * $discount;
    }
    return $price;
}

function percent(int $one, int $two): int
{
    return $one / $two * 100 - 100;
}

function order()
{
    return (new \App\Plugins\Ordered);
}