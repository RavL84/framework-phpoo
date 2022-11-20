<?php
namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;

/**
 * Description of HBox
 *
 * @author raul
 */
class HBox extends Element{
    public function __construct() {
        parent::__construct('div');
    }
    
    public function add(string | Element $child) {
        $wrapper = new Element('div');
        $wrapper->style = 'display: inline-block';
        $wrapper->add($child);
        
        parent::add($wrapper);
        
        return $wrapper;
        
    }
}
