<?php

namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;

/**
 * Description of Card
 *  
 * Essa classe representa um elemento html, por meio desta podemos criar uma área
 *   delimitada com bordas e um título no topo.
 * Usaremos as classe do bootstrap 5 para criar os elementos decendentes dessa
 *  nossa classe elemento.
 * 
 * @author raul
 * @date 19/11/2022
 */
class Card extends Element {

    private Element $body;
    private Element $footer;

    /**
     * @param String $title_card Descrição do elemento card.
     */
    public function __construct(string $title_card = '') {
        parent::__construct('div');

        $this->class = 'card';

        if ($title_card) {
            $head = new Element('div');
            $head->class = 'card-header';

            $title = new Element('div');
            $title->class = 'card-title';

            $label = new Element('h4');
            $label->add($title_card);

            $head->add($title);
            $title->add($label);
            parent::add($head);
        }

        $this->body = new Element('div');
        $this->body->class = 'card-body';
        parent::add($this->body);

        $this->footer = new Element('div');
        $this->footer->class = 'card-footer';
    }

    public function add(string|Element $content) {
        $this->body->add($content);
    }

    public function addFooter(string|Element $footer) {
        $this->footer->add($footer);
        parent::add($this->footer);
    }

}
