<?php

    function render(string $tmpl, array $params = []): string
    {
        ob_start();
        extract($params);
        require 'resources/templates/' . $tmpl . '.php';
        return ob_get_clean();
    }
