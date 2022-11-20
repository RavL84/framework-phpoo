<?php
use Livro\Control\AbstractPage;
use Livro\Control\Action;
use Livro\Widgets\Dialog\Question;

/**
 * Description of QuestionControlTest
 *
 * @author raul
 */
class QuestionControlTest extends AbstractPage {
    public function __construct() {
        parent::__construct();
        
        $action1 = new Action([$this, 'onConfirmacao']);
        $action2 = new Action([$this, 'onNegacao']);
        new Question('Você deseja confirmar a ação ?', $action1, $action2);
         
    }
    
    public function onConfirmacao() {
        print 'Você escolheu confirmar a ação.';
    }
    
    public function onNegacao() {
        print 'Voçê escolheu negar a ação.';
    }
}
