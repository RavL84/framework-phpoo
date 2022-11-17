<?php
/**
 * Esse arquivo simula um cliente que pode estar em qualquer lugar mas que consegue 
 *   clamar o servidor rest e solicitar um serviço desde que esse cliente consiga 
 *   enviar requisições para o nosso servidor. 
 *  
 */

$location = 'http://localhost/framework-phpoo/rest.php';

$parametros = [];
$parametros['class'] = 'PessoaServices';
$parametros['method'] = 'getData';
$parametros['id'] = 1;

//usa a funça http_build_query que recebe um vetor de string e monta uma url de requisição;
$url = $location . '?' . http_build_query($parametros);

echo '<pre>';
    var_dump(json_decode(file_get_contents($url)));
echo '</pre>';
