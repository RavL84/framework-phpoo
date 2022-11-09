<?php

use Livro\Control\AbstractPage;
use Livro\DataBase\Transaction;
use Livro\DataBase\Repository;
use Livro\DataBase\Criteria;

/*
 * Description of CidadeControl
 *
 * @author raul
 */

class CidadeControl extends AbstractPage {

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
