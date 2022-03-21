<?php

use app\Controllers\News;

$routes = [
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
        'file' => 'Pages/main.html',
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
