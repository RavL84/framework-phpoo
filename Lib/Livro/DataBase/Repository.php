<?php
namespace Livro\DataBase;

use Exception;
require_once 'Criteria.php';

/**
 * Description of Repository
 *
 * @author raul
 */
class Repository {

    private string $activeRecord;

    public function __construct(string $classe) {
        $this->activeRecord = $classe;
    }

    public function load(Criteria $criteria) {
        $sql = "SELECT * FROM " . constant($this->activeRecord . '::TABLENAME');
        
        if ($criteria) {
            $expression = $criteria->dump();
            if ($expression) {
                $sql .= ' WHERE ' . $expression;
            }
        }

        $order = $criteria->getProperty('order');
        $limit = $criteria->getProperty('limit');
        $offSet = $criteria->getProperty('offset');

        if ($order) {
            $sql .= ' ORDER BY ' . $order;
        }

        if ($limit) {
            $sql .= ' LIMIT ' . $limit;
        }

        if ($offSet) {
            $sql .= ' OFFSET ' . $offSet;
        }

        if ($conn = Transaction::get()) {
            Transaction::log($sql);
            $result = $conn->query($sql);

            if ($result) {
                $results = [];
                while ($row = $result->fetchObject($this->activeRecord)) {
                    $results[] = $row;
                }
                return $results;
            }
        } else {
            throw new Exception('Não há transações');
        }
    }

    public function delete(Criteria $criteria) {
        $sql = "DELETE FROM " . constant($this->activeRecord . '::TABLENAME');

        if ($criteria) {
            $expression = $criteria->dump();
            if ($expression) {
                $sql .= 'WHERE ' . $expression;
            }
        }
        if ($conn = Transaction::get()) {
            Transaction::log($sql);
            return $conn->query($sql);
        } else {
            throw new Exception('Não há transações');
        }
    }

    public function count(Criteria $criteria) {
        $sql = "SELECT count(*) FROM " . constant($this->activeRecord . '::TABLENAME');

        if ($criteria) {
            $expression = $criteria->dump();
            if ($expression) {
                $sql .= ' WHERE ' . $expression;
            }
        }
        if ($conn = Transaction::get()) {
            Transaction::log($sql);
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch();
                return $row[0];
            }
        } else {
            throw new Exception('Não há transações');
        }
    }

}
