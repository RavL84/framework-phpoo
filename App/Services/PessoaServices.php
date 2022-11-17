<?php

use Livro\DataBase\Transaction;

/**
 * Description of PessoaServices
 * 
 *  Padrão Remote Facade
 * 
 *  Classe de serviço é responsável por buscar um objeto no banco, através do 
 *   método getData que recebe uma requisição como parâmetro e identifica o id
 *   através desse id abre uma transação com o banco livro e com o uso da classe
 *   abstract Record para busca o objeto, converte o objeto em array e retorna 
 *   os dados em forma de array.
 * 
 * @author raul
 * @date 16/11/2022
 * 
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
