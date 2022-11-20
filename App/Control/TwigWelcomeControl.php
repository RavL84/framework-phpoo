<?php

use Livro\Control\AbstractPage;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
/**
 * Description of TwigWelcomeControl
 *
 * @author raul
 */
class TwigWelcomeControl extends AbstractPage{
    public function __construct() {
        parent::__construct();
   
        $loader = new FilesystemLoader('App/Resources');
        $twig = new Environment($loader); 
        $template = $twig->load('welcome.html');
        
        $replaces = [];
        $replaces['nome'] = 'Maria Maria';
        $replaces['rua'] = 'Rua sem nome';
        $replaces['cep'] = '874132-663';
        $replaces['fone'] = '(21)8888-8888';
        
        print $template->render($replaces);
        
    }
}
