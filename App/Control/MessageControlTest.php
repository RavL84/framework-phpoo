<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Dialog\Message;
/**
 * Description of MessageControlTest
 *
 * Essa classe é responsável por criar um elemento menssagem que atráves de uma 
 *  verificação exibe um erro ou uma informação obedecendo o padrão bootstrap de 
 *  classes.
 * 
 * @author raul
 * @date 19/11/2022
 */
class MessageControlTest extends AbstractPage{

    public function __construct() {
        parent::__construct();
        
        new Message('info', 'Informações do sistema');
        new Message('error', 'Erro do sistema');
        
       
        
        
    }
    
    
}
