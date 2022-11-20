<?php

namespace Livro\Widgets\Dialog;

use Livro\Widgets\Base\Element;

/**
 * Description of Message
 *
 * Essa clsse tem como objetivo criar elementos de diálogo com o usuario, seja
 *  de erro ou de informções gerais.
 * 
 * Utilizamos as classes do bootstrap 5.
 * 
 * 
 * @author raul
 * @date 19/11/2022
 */
class Message{
//    Rebece dois parâmetros, o tipo (erro ou info) e a menssagem.
    public function __construct(string $type, string $message) {
        
        $div = new Element('div');
        
        if($type == 'info'){
            $div->class = 'alert alert-info';
            
        }elseif($type == 'error'){
            $div->class = 'alert alert-danger';
         
            
        }
       
        $div->add($message);
        $div->show();
    }
}
