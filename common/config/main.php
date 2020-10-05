<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        // ...
    ],
	'modules' => [
		'admin' => [
			'class' => 'mdm\admin\Module',
		]
	],
	'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ]
    ]
];
