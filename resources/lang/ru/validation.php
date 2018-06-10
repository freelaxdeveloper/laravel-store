<?php

return [
    'custom' => [
        'g-recaptcha-response' => [
            'required' => 'Google-captcha обязательна к прохождению',
            'captcha' => 'Вы ошиблись при вводе Google-captcha! Повторите попытку',
        ],
        'captcha' => [
            'captcha' => 'Вы ошиблись при вводе Google-captcha! Повторите попытку',
        ],
        'sms_code' => [
            'required' => 'Введите код пришедший на ваш номер телефона',
            'sms' => 'Вы ошиблись при вводе SMS кода',
        ],
        'first_last' => [
            'required' => 'Имя и фамилия обязательны'
        ],
        'mobile' => [
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