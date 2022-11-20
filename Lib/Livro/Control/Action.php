<?php

namespace Livro\Control;

use Livro\Control\IAction;


/**
 * Description of Action
 * Essa classe é responsável por criar uma ação e identificar os parâmetros que 
 *  serão usados para montar a url através do método serialize.
 * @author raul
 * @date 20/11/2022
 */
class Action implements IAction{
    private $action;
    private $param;
    
    
    public function __construct(array $action) {
        $this->action = $action;
        
    }
    
//    Armazena os parâmetros em $this->param
    public function setParameter( $param,  $value) {
        $this->param[$param] = $value;
    }
    
//    Verifica os parâmetros passados e a ação passada via construtor.
//    depois monta a url.
    public function serialize() {
//        Verifica se a acao e um metodo
        if(is_array($this->action)){
            
//            Obtem o nome da classe 
            $url['class'] = is_object($this->action[0]) 
                    ? get_class($this->action[0]) : $this->action[0];
            
//            Obtem o nome do metodo 
            $url['method'] = $this->action[1];
            
//            verifica se ha parametros
            if ($this->param){
                $url = array_merge($url, $this->param);
            }
//            monta a URL
            return '?' . http_build_query($url);
        }
    }
}
