<?php
use Livro\Control\AbstractPage;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Container\HBox;


/**
 * Description of BoxControlTest
 * 
 * Essa classe é responsável por criar uma caixa horizontal e adicionar outros 
 *  elementos.
 * 
 *
 * @author raul
 * @date 19/11/2022
 */
class BoxControlTest extends AbstractPage{
    public function __construct() {
        parent::__construct();
        
        $painel1 = new Panel('Painel 1');
        $painel1->style = 'margin: 10px';
        $painel1->add('painel 1');
        
        $painel2 = new Panel('Painel 2');
        $painel2->style = 'margin: 10px';
        $painel2->add('painel 2');
        
        $box1 = new HBox;
        $box1->add($painel1);
        $box1->add($painel2);
        
        parent::add($box1);
        
    }
}
