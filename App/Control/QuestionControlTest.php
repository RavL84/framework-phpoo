<?php
use Livro\Control\AbstractPage;
use Livro\Control\Action;
use Livro\Widgets\Dialog\Question;

/**
 * Description of QuestionControlTest
 *
 * Essa classe é responsável por criar um elemento de questionamento do usuário,
 *  construimos dois objetos Action passando um array contendo a propria classe e
 *  o método que devera ser executado de acordo com a escolha do usuário.
 * 
 * Por ultimo criamos um objeto Question que recebe uma mensagem e os dois 
 *  objetos criados anteriomente.
 * 
 * @author raul
 * @date 20/11/2022
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
