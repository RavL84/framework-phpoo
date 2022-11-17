<?php

use Livro\Control\AbstractPage;
use Livro\DataBase\Transaction;
use Livro\DataBase\Repository;
use Livro\DataBase\Criteria;

/*
 * Description of CidadeControl
 * Padrão Front Controller
 * 
 * Que verifica as requisições a partir de uma classe abstrata e é chamada de forma
 *  dinâmica não importando o nome da classe desde que extenda a classe abstrata
 *  de analise de requisições.
 * 
 * @author raul
 * @date 16/11/2022
 */

class CidadeControl extends AbstractPage {
    
//    Abre transação e lista registros
    public function listar() {
        try {

            Transaction::open('livro');

            $criteria = new Criteria;
            $criteria->setProperty('order', 'id');

            $repository = new Repository('Cidade');
            $cidades = $repository->load($criteria);

            if ($cidades) {
                foreach ($cidades as $cidade) {
                    print "{$cidade->id} - {$cidade->nome}" . PHP_EOL;
                }
            }

            Transaction::close();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
    }

}
