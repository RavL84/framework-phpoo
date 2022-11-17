<?php

use Livro\Control\AbstractPage;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

//require_once '../Resources/';
/**
 * Description of TwigSampleControl
 * 
 * Padrão Template View
 * 
 * Essa classe é responsável por montar um template utilizando o Twig, o FilesystemLoader
 *   carrega o arquivo contendo os templates, cria um objeto FilesystemLoader e executa
 *   o método load() para carregar o arquivo html (template).
 *
 * @author raul
 * @date 16/11/2022
 * 
 */
class TwigSampleControl extends AbstractPage {

    public function __construct() {        

        $loader = new FilesystemLoader('App/Resources');
        $twig = new Environment($loader); 
        $template = $twig->load('form.html');

        $replaces = [];
        $replaces['title'] = 'Título do formulario';
        $replaces['action'] = 'index.php?class=TwigSampleControl&method=onGravar';
        $replaces['nome'] = 'Maria';
        $replaces['endereco'] = 'Rua das flores';
        $replaces['telefone'] = '(50)8456-6987';

        print $template->render($replaces);
    }

    public function onGravar($param) {
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }

}
