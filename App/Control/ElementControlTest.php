<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Base\Element;
use Livro\Widgets\Container\Panel;

/**
 * Description of ElementControlTest
 * 
 * Essa classe auxilia na montagem de tags de forma automatica, configura estilos
 *   e exibe o resultado montando na tela.
 * 
 * Essa classe assim como as demais de controle extende a AbstractPage que analisa
 * a requisição e executa a classe de controle.
 *
 * @author raul
 * @date 16/11/2022
 * 
 */
class ElementControlTest  extends AbstractPage{
    public function __construct() {
        
        parent::__construct();
        
        $div = new Element('div');
        $div->style = 'text-align:center;';
        $div->style.= ' font-weight:bold;';
        $div->style.= ' font-size:14pt;';
        $div->style.= 'margin:20px;';
//        
        $p = new Element('p');
        $p->add('Isto é um teste de parágrafo');
        $div->add($p);
        
        parent::add($div);
    }
}
