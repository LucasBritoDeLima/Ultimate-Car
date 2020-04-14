<?php
require_once './conexao/Conexao.php';
class Login {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    public function isLoggedIn(){
        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
            return false;
        }
        return true;
    }
}
