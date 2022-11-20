<?php

namespace Livro\Widgets\Form;

use Livro\Control\Action;
use Livro\Widgets\Form\IFormElement;



/**
 * Description of Form
 *
 * @author raul
 */
class Form {

    private string $title;
    private string $name;
    private array $fields;
    private Action $actions;

    public function __construct($name = 'my_form') {
        $this->setName($name);
        $this->actions = [];
        $this->fields = [];
    }

    private function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function addField(string $label, IFormElement $object, string $size = '100%'): void {
        $object->setSize($size);
        $object->setLabel($label);
        $this->fields[ $object->getName() ] = $object;
    }

    public function getField(): array {
        return $this->fields;
    }

    public function addAction(string $label, IAction $action) {
        $this->actions[$label] = $action;
    }

    public function getAction(): array {
        return $this->actions;
    }

    public function setData($object) {
        foreach ($this->fields as $name => $field){
            if($name && isset($object->$name)){
                $field->setValue( $object->$name);
            }
        }
    }

    public function getData($type = 'stdClass') {
        $object = new $type;
        foreach ($this->fields as $name => $field){
            $value = isset($_POST[$name]) ? $_POST[$name] : '';
            $object->$name = $value;
        }
        
        return $object;
    }

}
