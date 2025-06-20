<?php

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require dirname(__DIR__, 2) . '/common/config/db.php',
    ],

    'controllerMap' => [
        'migrate/create' => \bizley\migration\controllers\MigrationController::class,
    ],

    // 'params' => require __DIR__ . '/params.php',
];
