<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Container\Card;

/**
 * Description of CardControlTest
 *
 * Essa classe tem por finalidade criar um elemento Card e atribuir ao mesmo alguns
 *  estilos e classe bootstrap.
 * 
 * @author raul
 * @date 19/11/2022
 */
class CardControlTest extends AbstractPage{
    public function __construct() {
        parent::__construct();
        
        $card = new Card('Titulo do card');
        $card->style = 'margin: 20px';
        $card->add('content content content content');
        $card->addFooter('Rodapé');
        
        parent::add($card);
    }
    
    
}
