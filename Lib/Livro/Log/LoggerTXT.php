<?php

require_once './AbstractLogger.php';
/**
 * Description of LoggerTXT
 *
 * @author raul
 */
class LoggerTXT extends AbstractLogger {

    public function write($mensagem) {

        $text = date('Y-m-d H:i:s') . ' : ' . $mensagem;
        
//      Abre um arquivo con o nome informado 'fileName'.
//      O parametro 'a' move cursor para o final do arquivo se ele não existir 
//        tenta cria-lo.
        $handler = fopen($this->fileName, 'a');

//      Escreve no arquivo retornado por handler 
        fwrite($handler, $text);

//      O arquivo handler apontado é fechado  
        fclose($handler);
    }

}
