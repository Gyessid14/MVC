<?php
    require_once 'controllers/TareaController.php';
    $controller = new TareaController();

    $accion = isset($_GET['accion']) ? $_GET['accion'] : 'index';
    switch ($accion) {
        case 'index':
            $controller->home();
            break;

    }

?>