<?php

namespace Livro\DataBase;

use Exception;
use PDO;



/**
 * Description of Connection
 *
 * @author raul
 */
class Connection {

    private function __construct() {
        
    }

    public static function open(string $nome) {
        if (file_exists("App/Config/{$nome}.ini")) {
            $db = parse_ini_file("App/Config/{$nome}.ini");
        } else {
            throw new Exception("Arquivo {$nome} não encontrado");
        }


        $host = isset($db['host']) ? $db['host'] : null;
        $name = isset($db['name']) ? $db['name'] : null;
        $user = isset($db['user']) ? $db['user'] : null;
        $pass = isset($db['pass']) ? $db['pass'] : null;
        $type = isset($db['type']) ? $db['type'] : null;

        $conn = new PDO("pgsql:host={$host};dbname={$name}", "{$user}", "{$pass}");
        switch ($type) {
            case 'pgsql':
//                $port = $port ? $port : '5432';
                $conn = new PDO("pgsql:host={$host};dbname={$name}", "{$user}", "{$pass}");
                break;
            case 'mysql':
//                $port = $port ? $port : '3306';
                $conn = new PDO("pgsql:host={$host};dbname={$name}", "{$user}", "{$pass}");
                break;
            case 'sqlite':
                $conn = new PDO("sqlite:{$name}");
                $conn->query('PRAGMA foreign_keys = ON');
                break;
            case 'ibase':
                $conn = new PDO("firebird:dbname={$name}", $user, $pass);
                break;
            case 'oci8':
                $conn = new PDO("oci:dbname={$name}", $user, $pass);
                break;
            case 'mssql':
                $conn = new PDO("dblib:host={$host}:{$port};dbname={$name}", $user, $pass);
                break;
        }
        
        // define para que o PDO lance exceções na ocorrência de erros

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

}
