<?php
require_once "controlador/controlleralumno.php";

$controller = new Controlleralumno();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'insertar':
        $controller->create();
        break;
    case 'eliminar':
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
    case 'editar':
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        }
        break;
    case 'actualizar':
        $controller->update();
        break;
    default:
        $controller->index();
        break;
}
?>

