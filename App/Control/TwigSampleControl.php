<?php
//use Livro\Control\AbstractPage;
use Livro\Control\Page;
/**
 * Description of TwigSampleControl
 *
 * @author raul
 */
class TwigSampleControl extends Page{
    public function __construct() {
       $loader = new Twig_Loader_Filesystem('App/Resources');
       $twig = new Twig_Environment($loader);
       $template = $twig->loadTemplate('form.html');
       
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
