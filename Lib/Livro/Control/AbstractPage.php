<?php

namespace Livro\Control;

use Livro\Widgets\Base\Element;

/**
 * Description of AbstractPage
 *  Essa classe faz uso de métodos nativos no PHP (method_exists e call_user_func)
 *   que automatizam a execução de um método em uma classe.
 * 
 * @author raul
 * @date 16/11/2022
 */
class AbstractPage extends Element {

    public function __construct($name) {
        parent::__construct('div');
    }

    /**
     * Executa determinado método de acordo com os parâmetros recebidos
     */
    public function show() {
        if ($_GET) {
            $method = isset($_GET['method']) ? $_GET['method'] : null;

            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $_REQUEST);
            }
        }
        parent::show();
    }

}
