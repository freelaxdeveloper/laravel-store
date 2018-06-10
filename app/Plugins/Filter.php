<?php namespace App\Plugins;

abstract class Filter {

    static function mobile(string $mobile): int
    {
        return str_replace(['(', ')', '+', ' ', '-'], '', $mobile);
    }
}
