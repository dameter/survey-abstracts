<?php

return [
    // string, required, root directory of all source files
    'sourcePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'languages' => ['et'],
    'translator' => 'Yii::t',
    'sort' => false,
    'removeUnused' => true,
    'only' => ['*.php'],
    'except' => [
        '.git',
        '.gitignore',
        '.gitkeep',
        '/messages',
    ],

    'format' => 'php',
    'messagePath' => __DIR__,
    'overwrite' => true,

    'ignoreCategories' => [
        'yii',
    ],
];
