<?php
class RuDate {
    public static function getRuDate ($date) {
        $monthsList = [".01." => "января", ".02." => "февраля",
            ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
            ".07." => "июля", ".08." => "августа", ".09." => "сентября",
            ".10." => "октября", ".11." => "ноября", ".12." => "декабря"];

        $dateFromForm = date("d.m.Y", strtotime($date));
        $replace = date(".m.", strtotime($date));
        return str_replace($replace, " ".$monthsList[$replace]." ", $dateFromForm);
    }
}