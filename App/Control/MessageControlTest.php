<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Dialog\Message;
/**
 * Description of MessageControlTest
 *
 * @author raul
 */
class MessageControlTest extends AbstractPage{

    public function __construct() {
        parent::__construct();
        
        new Message('info', 'Informações do sistema');
        new Message('error', 'Erro do sistema');
        
       
        
        
    }
    
    
}
