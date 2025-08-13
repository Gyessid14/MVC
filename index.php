<?php
    require_once 'controllers/TareaController.php';
    $controller = new TareaController();

    $accion = isset($_GET['accion']) ? $_GET['accion'] : 'index';
    switch ($accion) { 
        case 'crear':
            $controller->crear();
            break;
        case 'guardar':
            $controller->guardar();
            break;
        default:
            $controller->index();
            break;


    }

?>