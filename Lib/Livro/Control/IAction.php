<?php


namespace Livro\Control;

/**
 *
 * @author raul
 */
interface IAction {
    public function setParameter($param, $value);
    
    public function serialize();
    
}
