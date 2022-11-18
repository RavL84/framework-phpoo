<?php

namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;

/**
 * Description of Panel
 * 
 * Essa classe é responsável por montar um painel no formato bootstrap, que será
 *  utilizado como componente e será montado pela classe de controle na aplicação.
 * 
 * 
 * 
 * 
 *
 * @author raul
 * 
 * 
 */
class Panel extends Element {

    private Element $body;
    private Element $footer;

//    Cria os objetos Element e adiciona os atributos class através do método 
//      mágico  __set na classe ancestral Element.
    public function __construct(string $panelTitle = null) {
        
        parent::__construct('div');
        $this->class = 'panel panel-default';

        if ($panel_title) {
            $head = new Element('div');
            $head->class = 'panel-heading';

            $title = new Element('div');
            $title->class = 'panel-title';

            $label = new Element('h4');
            $label->add($panel_title);

            $head->add($title);
            $title->add($label);

            parent::add($head);
        }
        $this->body = new Element('div');
        $this->body->class = 'panel-body';
        parent::add($this->body);

        $this->footer = new Element('div');
        $this->footer->class = 'panel-footer';
    }

    /**
     * Adiciona o content no body e utiliza o método da classe ancestral 
     * para adicionar elementos ao body, cada vaz que chamar-mos - método add().
     */
    public function add(string | Element $content) {
        $this->body->add($content);
    }

    /**
     * Adiciona o content no footer e utiliza o método da classe ancestral 
     * para adicionar elementos ao footer, cada vaz que chamar-mos - método add().
     */
    public function addFooter(string | Element $footer) {
        $this->footer->add($footer);
        parent::add($this->footer);
    }

}
