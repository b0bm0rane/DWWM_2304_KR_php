
<?php

class Connexion
{


    private static $connection = null;
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $base = "colblanc";

    private function __construct()
    {
    }
    static public  function getinstance()
    {

        if (is_null(self::$connection)) {


            try {
                self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$base,
                    self::$user,
                    self::$pass,
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    )
                );
            } catch (PDOException $e) {

                die("Database connection failed" . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
