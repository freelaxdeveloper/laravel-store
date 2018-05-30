<?php

return [
    'custom' => [
        'g-recaptcha-response' => [
            'required' => 'Google-captcha обязательна к прохождению',
            'captcha' => 'Вы ошиблись при вводе Google-captcha! Повторите попытку',
        ],
        'first_last' => [
            'required' => 'Имя и фамилия обязательны'
        ],
        'phone' => [
            'required' => 'Номер телефона обязателен'
        ],
        'region' => [
            'required' => 'Выберите область'
        ],
        'cities' => [
            'required' => 'Выберите город'
        ],
        'offices' => [
            'required' => 'Выберите номер отделения новой почты'
        ],
    ],
];