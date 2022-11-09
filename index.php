<?php

//require_once 'Lib/Livro/Core/ClassLoader.php';
//$al= new Livro\Core\ClassLoader;
//$al->addNamespace('Livro', 'Lib/Livro');
//$al->register();
//
//require_once 'Lib/Livro/Core/AppLoader.php';
//$al= new Livro\Core\AppLoader;
//$al->addDirectory('App/Control');
//$al->addDirectory('App/Model');
//$al->register();

require 'vendor/autoload.php';

if ($_GET) {
    $livro = new SimpleForm('my_form');
    var_dump($livro);
    exit();
//    $class = $_GET['class'];
}

echo '<link rel="stylesheet" href="App/Templates/css/bootstrap.min.css">';

//echo '  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">';
