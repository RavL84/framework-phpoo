<?php


/**
 * Description of AbstractLogger
 *
 * @author raul
 */
abstract class AbstractLogger {
    protected $fileName;
    
    public function __construct($fileName) {
        
        $this->fileName = $fileName;
        file_put_contents($fileName, '');
    }
    abstract function write($mensagem);
}
