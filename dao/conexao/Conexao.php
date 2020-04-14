<?php 
class Conexao {
    static private $instance;
    /*
     * 
     *@return PDO 
     */
    public static function getInstance() {
        try {
            if(!isset(self::$instance)){
                self::$instance = new PDO("mysql:host=localhost;dbname=ultimatecar;charset=utf8", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        } catch (PDOException $exec) {
            echo $exec->getMessage();
        }
    }
}