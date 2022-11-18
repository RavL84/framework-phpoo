<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Container\Panel;

/**
 * Description of PainelControlTest
 * 
 * Essa classe é responsável por pontar um elemento HTML, cria-se um objeto Panel
 *  e utliza os métodos herdados da classe Element.
 *
 * @author raul
 * @date 17/11/2022
 */
class PainelControlTest extends AbstractPage {

    public function __construct() {
        parent::__construct();

        $panel = new Panel('Titulo do painel');
        $panel->style = 'margin: 20px';
        $panel->add('Conteúdo contendo conteúdo');

        parent::add($panel);
    }

}
