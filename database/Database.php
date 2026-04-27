<?php

class Database
{
    private static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {

          $host = 'localhost';
          $db = 'cinetrack';
          $user = 'kroth';
          $password = 'kroth';

            $dsn = "mysql:host=$host;dbname=$db;chatset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, $user, $password);

                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}