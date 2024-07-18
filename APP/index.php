<?php
    //generamos un aruta para acceder a nuestra pagina 
    //valores para nuestra ruta C= controlador M= metodo que vamos a llamar 
    //ruta base : localhost/php-3a?C=alumnoController&M=index  localhost/php-3a?C=cursoController&M=index
    
    define("controlador","app/controller/");

    //preguntamos si se esta pasadon al controlador por la url 
    $control= isset($_GET['C'])?$_GET['C']:'';
    
    //creamos la ruta del controlador 
    $ruta=controlador . $control . ".php";
    //ejemplo ruta app/controller/alumnoController.php

    if(is_file($ruta)){
        require_once($ruta);
        $objeto= new $control();

        $metodo= isset($_GET['M'])? $_GET['M']:'';

        if(method_exists($objeto,$metodo)){
            $objeto->$metodo();
        }else{
            require_once("app/controller/defaultController.php");
            $defautl= new defaultController();
            $defautl->index();
        }

    }else{
        require_once("app/controller/defaultController.php");
        $defautl= new defaultController();
        $defautl->index();
    }

?>