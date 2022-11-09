<?php

use Livro\DataBase\Transaction;
use Livro\DataBase\Repository;
use Livro\DataBase\Criteria;

/**
 * Description of PessoaController
 *
 * @author raul
 */
class PessoaController {

    public function listar() {
        try {
            Transaction::open('livro');
            $criteria = new Criteria;
            $criteria->setProperty('order', 'id');

            $repository = new Repository('Pessoa');
            $pessoas = $repository->load($criteria);

            if ($pessoas) {
                foreach ($pessoas as $pessoa) {
                    print "{$pessoa->id} - {$pessoa->nome}" . PHP_EOL;
                }
            }

            Transaction::close();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
    }
    
    public function show($param) {
        if(isset($param['method']) && $param['method'] === 'listar'){
            $this->listar();
        }
    }

}

