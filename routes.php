<?php

use app\Controllers\News;

$routes = [
    '' => [
        'controller' => Authorization::class,
        'method' => 'login',
        'child' => [

        ],
    ],
    'admin' => [
        'file' => 'Pages/Admin/main.html',
        'child' => [

            'news' => [
                'file' => 'test',
                'child' => [

                    'add' => [
                        'controller' => News::class,
                        'method' => 'getNews',
                        'child' => [

                        ],
                    ],
                    'delete' => [
                        'file' => 'Pages/Admin/InfoFromTableNews.php',
                        'child' => [

                        ],
                    ]
                ]
            ]
        ],
    ],
    'news' => [
        'controller' => News::class,
        'method' => 'main',
        'child' => [

            'read' => [
                'controller' => News::class,
                'method' => 'getNews',
                'child' => [

                ],
            ]
        ]
    ]
];
