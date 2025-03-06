<?php
// File: controlador/controllermaestro.php

require_once dirname(__DIR__) . "/modelo/maestro.php";

class ControllerMaestro {
    private $modeloMaestro;

    public function __construct($table_name = 'maestrolaboratorista') {
        try {
            $this->modeloMaestro = new Maestro($table_name);
        } catch (Exception $e) {
            die("Error al crear el modelo maestro: " . $e->getMessage());
        }
    }

    public function index() {
        $maestros = $this->modeloMaestro->getAll();
        require_once dirname(__DIR__) . "/vista/maestro/index.php";
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maestro = $this->sanitizeInput($_POST);
            if ($this->modeloMaestro->create($maestro)) {
                header('Location: index.php');
                exit();
            } else {
                $error = "Error al crear el maestro. Por favor, intente nuevamente.";
                require_once dirname(__DIR__) . "/vista/maestro/formulario.php";
            }
        } else {
            require_once dirname(__DIR__) . "/vista/maestro/formulario.php";
        }
    }

    public function edit($id) {
        $maestro = $this->modeloMaestro->getOne($id);
        if ($maestro) {
            require_once dirname(__DIR__) . "/vista/maestro/edit.php";
        } else {
            $error = "Maestro no encontrado.";
            $this->index();
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maestro = $this->sanitizeInput($_POST);
            if ($this->modeloMaestro->update($maestro)) {
                header('Location: index.php');
                exit();
            } else {
                $error = "Error al actualizar el maestro. Por favor, intente nuevamente.";
                require_once dirname(__DIR__) . "/vista/maestro/edit.php";
            }
        }
    }

    public function delete($id) {
        if ($this->modeloMaestro->delete($id)) {
            header('Location: index.php');
            exit();
        } else {
            $error = "Error al eliminar el maestro. Por favor, intente nuevamente.";
            $this->index();
        }
    }

    private function sanitizeInput($data) {
        $sanitized = [];
        foreach ($data as $key => $value) {
            $sanitized[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $sanitized;
    }
}