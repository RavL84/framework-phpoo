<?php
use Livro\Control\AbstractPage;
use Livro\Control\Action;

/**
 * Description of ActionControlTest
 * Essa classe testa a Action passando parâmetros e por ultimo serializando os
 *  parâmetros passados.
 * 
 * @author raul
 * @date 20/11/2022
 */
class ActionControlTest extends AbstractPage{
    public function __construct() {
        parent::__construct();
       
        $action1 = new Action([$this, 'executaAcao']);
        $action1->setParameter('codigo', 4);
        $action1->setParameter('nome', 'teste');
        
        print $action1->serialize();
        
    }
    
    public function executaAcao($param) {
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }
}
