<?php

class Connexion
{

    private static $connection = null;
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $base = "db_ecf_web";

    private function __construct()
    {
    }
    static public  function getinstance()
    {

        if (is_null(self::$connection)) {


            try {
                self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$base . ";charset=utf8",
                    self::$user,
                    self::$pass,
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                    )
                );
            } catch (PDOException $e) {

                die("Database connection failed" . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
