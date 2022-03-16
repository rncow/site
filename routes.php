<?php
$routes = [
    'admin' => [
        'file' => null,
        'child' => [

            'news' => [
                'file' => 'Pages/Admin/AddInfoToTableForm.php',
                'child' => [

                    'add' => [
                        'file' => 'Pages/Admin/AddInfoToTableForm.php',
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
        'file' => null,
        'child' => [

            'read' => [
                'file' => 'Pages/InfoFromTableNews.php',
                'child' => [

                ],
            ]
        ]
    ]
];
class Counter {
    private $counter = 0;
    function ExploreRoutes(array $routes, array $uri) {
        foreach ($routes as $key => $array) {
            if ($uri[$this->counter] == $key) {
                if ($array['child']) {
                    $this->counter++;
                    return $this->ExploreRoutes($array['child'], $uri);
                } else {
                    return $array['file'];
                }
            }
        }
        return "Pages/error404.html";
    }
}