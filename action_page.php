<?php
if ($_GET["name"] != '') {
    $array = [
        'name' => htmlspecialchars($_GET["name"]), 'length' => mb_strlen($_GET["name"])
    ];
}
require_once('form.php');

