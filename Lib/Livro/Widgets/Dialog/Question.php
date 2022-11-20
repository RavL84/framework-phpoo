<?php
namespace Livro\Widgets\Dialog;

use Livro\Widgets\Base\Element;


/**
 * Description of Question
 * 
 * Essa clsse tem como função exibir mensagens de questionamento aos usuários,
 *  nesse caso será aplicado um questionamento com duas opções (sim/não);
 *
 * @author raul
 * @date 19/11/2022
 * 
 */
class Question {
    
    public function __construct($message, Action $action_yes, Action $action_no = null) {
        $div = new Element('div');
        $div->class = 'alert alert-warning';
        
//        Converte os nomes de métodos em URLs
        $url_yes = $action_yes->serialize();
        
        $link_yes = new Element('a');
        $link_yes->href = $url_yes;
        $link_yes->class = 'btn btn-success';
        $link_yes->add('Sim');
        
        $message.= '&nbsp' . $link_yes;
        
        if($action_no){
            $url_no = $action_no->serialize();
            $action_no->href = $url_no;
            $link_no->class = 'btn btn-danger';
            $link_no->add('Não');
            
            $message.= $link_no;
        }
        
        $div->add($message);
        $div->show();
        
        
    }
    
}
