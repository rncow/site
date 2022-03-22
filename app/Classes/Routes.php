<?php

namespace app\Classes;

use app\Controllers\Error;

class Routes
{

    private $counter = 0;

    public function ExploreRoutes(array $routes, array $uri)
    {
        foreach ($routes as $key => $array) {
            if ($uri[$this->counter] == $key) {

                if ($uri[$this->counter + 1]) {
                    $this->counter++;
                    return $this->ExploreRoutes($array['child'], $uri);
                } else {
                    $class = new $array['controller'];

                    $function = $array['method'];

                    $class->$function();

                    return 0;
                }
            }
        }
        (new Error)->e404();
    }
}