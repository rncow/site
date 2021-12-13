<?php
class WorkWithString {
    private $text;
    //принимает при создании строку
    function __construct($text) {
        $this->text = $text;
    }
    //определение длины строки
    function lengthOfString() {
        return mb_strlen($this->text);
    }
    //дополнение строки
    function addStringPart($part) {
        $this->text .= $part;
    }
    //очищение строки
    function clearString() {
        $this->text = null;
    }
    //перезапись строки
    function rewriteString($newText) {
        $this->text = $newText;
    }
    //вывод строки
    function showString() {
        return $this->text;
    }
}
