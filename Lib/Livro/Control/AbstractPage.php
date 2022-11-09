<?php
namespace Livro\Control;
/**
 * Description of AbstractPage
 *  Classe de serviço com toda a lógica de busca de um objeto
 * 
 * @author raul
 */



/**
 * Page controller
 */
class AbstractPage 
{
    /**
     * Método construtor
     */
    public function __construct()
    {
//        parent::__construct('div');
    }
    
    /**
     * Executa determinado método de acordo com os parâmetros recebidos
     */
    public function show()
    {
        if ($_GET)
        {
            $method = isset($_GET['method']) ? $_GET['method'] : null;
            
            if (method_exists($this, $method))
            {
                call_user_func( [$this, $method], $_REQUEST);
            }
        }
        
        parent::show();
    }
}

//namespace Livro\Control;
///**
// * Description of AbstractPage
// *
// * @author raul
// */
//class AbstractPage {
//     public function show() {
//        if ($_GET) {
//           
//            $method = isset($_GET['method']) ? $_GET['method'] : null;
//
//            if (method_exists($this, $method)) {
//
//                call_user_func([$this, $method], $_GET);
//            }
//        } else {
//            print "Erro na requisicao" . PHP_EOL;
//        }
//    } 
//}
