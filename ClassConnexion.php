<?php

class Connexion
{
    private static $connexion = null;
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $base = "db_name";

    private function __construct()
    {
        
    }

    public static final function getInstance() // final = pas de possibilité d'en hériter
    {
        if(is_null(self::$connexion)){ // $this si attribut non static et self:: si attribut static

            try {
                self::$connexion = new PDO(
                    "mysql:host = " . self::$host . "; dbname = " . self::$base, 
                    self::$user, 
                    self::$pass, 
                    array( 
                        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));
            } 
            catch (PDOException $e) {
                die("Database connexion failed" . $e->getMessage());
            }
           
        }

        return self::$connexion;
    }
}
