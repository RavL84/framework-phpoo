<?php
namespace Livro\Widgets\Form;

/**
 *
 * @author raul
 */
interface IFormElement {
    public function setName($name);
    public function getName();
    public function setValue($value);
    public function getValue();
    public function show();
}
