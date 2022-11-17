<?php

use Livro\DataBase\Transaction;
use Livro\DataBase\Repository;
use Livro\DataBase\Criteria;

/**
 * Description of PessoaController
 * 
 * Padrão Page Controller
 * 
 *  Essa classe de controle analisa as requisições e com base nelas identifica
 *  Qual classe ou método executar.
 * 
 * @author raul
 * @date 16/11/2022
 */
class PessoaControl {

    // Método privado listar que é chamado no método show dessa mesma classe, ou seja,
    //  se a requisição existir e possuir uma chamada para o método listar então 
    //  o mesmo será executado.
    private function listar() {
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

//    Analisa as requisições e executa o método listar.
    public function show($param) {
        if (isset($param['method']) && $param['method'] === 'listar') {
            $this->listar();
        }
    }

}
