<?php


$config = [
    'id' => 'test-app',
    'basePath' => dirname(__DIR__). "/../src/",
    'bootstrap' => ['log'],
    'aliases' =>[
        '@vendor' => '@app/../vendor',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'dmadmin*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'dmabstract*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            'url' => "http://localhost"
        ],
    ],

];



return $config;
