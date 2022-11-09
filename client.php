<?php
// Simula um cliente fazendo uma requisição

$location = "http://localhost/curso-pablo/Apresentacao-e-controle/rest.php";
$parameters = [];
$parameters['class'] = 'PessoaServices';
$parameters['method'] = 'getData';
$parameters['id'] = '1';

//Recebe um vetor e monta uma requisição com http_build_query
$url = $location . '?' . http_build_query($parameters);

var_dump( json_decode( file_get_contents($url) ) );