<?php
if ($_GET["name"] != '') {
    $array = [
        'name' => $_GET["name"], 'length' => mb_strlen($_GET["name"])
    ];
}
require_once('form.html');

