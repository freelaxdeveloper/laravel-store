<?php namespace App\Plugins;

abstract class Filter {

    static function input_text(string $str): string
    {
        $str = preg_replace("#(^( |\r|\n)+)|(( |\r|\n)+$)|([^\pL\r\n\s0-9" . preg_quote(' []|`@\'ʼ"-–—_+=~!#:;$%^&*()?/\\.,<>{}©№«»', '#') . "]+)#ui", '', $str);
        return $str;
    }

    static function mobile(string $mobile): int
    {
        return preg_replace('/[^0-9]/', '', $mobile);
    }
}
