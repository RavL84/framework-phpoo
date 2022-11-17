<?php

use Livro\Control\AbstractPage;
use Livro\Widgets\Form\SimpleForm;

/*
 * Description of SimpleFormControl
 * 
 * Classe que monta o componente fornecendo os dados, nesse caso está sendo 
 *   montado um componente do tipo formulario (SimpleForm), fazendo uso o 
 *   reaproveitamento.
 * 
 * 
 * @author raul
 * @date 16/11/2022
 */

class SimpleFormControl extends AbstractPage {

    public function __construct() {
        $form = new SimpleForm('my_form');
        $form->setTitle('título');
        $form->addField('Nome', 'nome', 'text', 'Maria', 'form-control');
        $form->addField('Endereço', 'endereco', 'text', 'Rua das flores', 'form-control');
        $form->addField('Telefone', 'telefone', 'text', '(51) 1234-5678', 'form-control');
        $form->setAction('index.php?class=SimpleFormControl&method=onGravar');
        $form->show();
    }

    public function onGravar($param) {
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }

}
