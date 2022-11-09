<?php

use Livro\DataBase\Transaction;

/**
 * Description of PessoaServices
 *  Classe de serviço com toda a lógica de busca de um objeto
 * 
 * @author raul
 */
class PessoaServices {

    public static function getData($request) {
        $id_pessoa = $request['id'];

        Transaction::open('livro');

        $pessoa = Pessoa::find($id_pessoa);

        if ($pessoa) {
            $pessoa_array = $pessoa->toArray();
        } else {
            throw new Exception("Pessoa {$id_pessoa} não encontrado");
        }

        Transaction::close();


        return $pessoa_array;
    }

}
