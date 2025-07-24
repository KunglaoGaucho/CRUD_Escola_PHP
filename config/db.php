<?php

// Configuração de conexão do BD com o sistena
class Database
{
    private static $host = 'db';
    private static $db = 'escola';
    private static $user = 'root';
    private static $pass = '123';
    private static $conn;

    public static function connect()
    {
        if (!self::$conn) {
            try {
                self::$conn = new PDO(
                    "mysql:host=db;dbname=escola", "root", "123"
                );
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}
