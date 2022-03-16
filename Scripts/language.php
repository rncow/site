<?php
if(isset($_GET['languageID'])) {
    setcookie("language", $_GET['languageID'], time() + (86400 * 30), '/');
} else {
    setcookie("language", "2", time() + (86400 * 30), '/');
}
header('Location: ' . $_SERVER['HTTP_REFERER']);