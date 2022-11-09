<?php
namespace Livro\DataBase;

require_once 'Connection.php';

/**
 * Description of Transaction
 *
 * @author raul
 */
class Transaction {

    private static $conn;
    private static $logger;

    private function __construct() {
        
    }

    public static function open($database) {
        self::$conn = Connection::open($database);
        self::$conn->beginTransaction();
    }

    public static function close() {
        if (self::$conn) {
            self::$conn->commit();
            self::$conn = null;
        }
    }

    public static function get() {
        return self::$conn;
    }

    public static function rollBack() {
        if (self::$conn) {
            self::$conn->rollBack();
            self::$conn = null;
        }
    }

    
    public static function setLogger(AbstractLogger $logger) {
        self::$logger = $logger;
    }

    public static function log(string $mensagem) {
        if (self::$logger) {
            self::$logger->write($mensagem);
        }
    }

}
