<?php

require_once './Lib/Livro/Core/ClassLoader.php';

$al = new Livro\Core\ClassLoader();
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

/*
require_once './AppLoader.php';
$al = new Livro\Core\AppLoader();
$al->addDirectory('App/Control');
$al->addDirectory("App/Model");
$al->register();
*/

use Livro\DataBase\Connection;

$obj1 = Connection::open('livro');
var_dump($obj1);