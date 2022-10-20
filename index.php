<?php

    ini_set('display_errors','On');
    session_start();
    define('APP',__DIR__);

    //configuración entorno
    require 'config.php';
    require 'src/router.php';
    require 'src/routes.php';

    //enrutamiento
    $controlador = getRoute($routes);
    
    //llamar al controlador
    require 'src/controllers/'. $controlador.'.php';