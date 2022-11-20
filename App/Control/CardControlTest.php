<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Container\Card;

/**
 * Description of CardControlTest
 *
 * @author raul
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
