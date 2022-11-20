<?php

namespace Livro\Control;

use Livro\Control\IAction;


/**
 * Description of Action
 *
 * @author raul
 * @date 20/11/2022
 */
class Action implements IAction{
    private $action;
    private $param;
    
    
    public function __construct(array $action) {
        $this->action = $action;
        
    }
    
    public function setParameter( $param,  $value) {
        $this->param[$param] = $value;
    }
    
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
