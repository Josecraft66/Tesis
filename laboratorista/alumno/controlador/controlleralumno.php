<?php
require_once dirname(__DIR__) . "/modelo/alumno.php";

class ControllerAlumno {
    private $modeloAlumno;

    public function __construct() {
        try {
            $this->modeloAlumno = new Alumno();
        } catch (Exception $e) {
            die("Error al crear el modelo alumno: " . $e->getMessage());
        }
    }

    public function index() {
        try {
            $alumnos = $this->modeloAlumno->getAll();
            require_once dirname(__DIR__) . "/vista/alumno/index.php";
        } catch (Exception $e) {
            die("Error al obtener alumnos: " . $e->getMessage());
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $alumno = [
                'idalumno' => htmlspecialchars($_POST['idalumno']),
                'alumno' => htmlspecialchars($_POST['alumno']),
                'apaterno' => htmlspecialchars($_POST['apaterno']),
                'amaterno' => htmlspecialchars($_POST['amaterno']),
                'direccion' => htmlspecialchars($_POST['direccion']),
                'telefono' => htmlspecialchars($_POST['telefono'])
            ];
            if ($this->modeloAlumno->create($alumno)) {
                header('Location: index.php');
                exit();
            } else {
                $error = "Error al crear el alumno.";
                require_once dirname(__DIR__) . "/vista/alumno/formulario.php";
            }
        } else {
            require_once dirname(__DIR__) . "/vista/alumno/formulario.php";
        }
    }

    public function edit($id) {
        $alumno = $this->modeloAlumno->getOne($id);
        if ($alumno) {
            require_once dirname(__DIR__) . "/vista/alumno/edit.php";
        } else {
            die("Alumno no encontrado.");
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $alumno = [
                'idalumno' => htmlspecialchars($_POST['idalumno']),
                'alumno' => htmlspecialchars($_POST['alumno']),
                'apaterno' => htmlspecialchars($_POST['apaterno']),
                'amaterno' => htmlspecialchars($_POST['amaterno']),
                'direccion' => htmlspecialchars($_POST['direccion']),
                'telefono' => htmlspecialchars($_POST['telefono'])
            ];
            if ($this->modeloAlumno->update($alumno)) {
                header('Location: index.php');
                exit();
            } else {
                $error = "Error al actualizar el alumno.";
                require_once dirname(__DIR__) . "/vista/alumno/edit.php";
            }
        }
    }

    public function delete($id) {
        if ($this->modeloAlumno->delete($id)) {
            header('Location: index.php');
            exit();
        } else {
            die("Error al eliminar el alumno.");
        }
    }
}
?>

