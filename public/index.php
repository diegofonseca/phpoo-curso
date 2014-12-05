<?php

include '../vendor/autoload.php';

if (isset($_GET['page'])) {
    $pagina = ucfirst($_GET['page']);
    $class = "Controller\\{$pagina}";
    $class = new $class();
    if (method_exists($class, 'index'))
        $class->index($_GET, $_POST);
}