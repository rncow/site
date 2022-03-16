<?php
namespace Scripts;
use mysqli;

class Config {
    private $conn;
    public function __construct() {
        $this->conn = new mysqli("site", "root", "", "MyDB");
    }
    public function ReturnConnection() {
        return $this->conn;
    }
}