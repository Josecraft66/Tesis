<?php
require_once dirname(__DIR__) . '/conexion/conectar.php';

class Alumno {
    private $pdo;

    public function __construct() {
        $conex = new Conex();
        $this->pdo = $conex->getConnection();
    }

    public function getAll() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM alumnolaboratorista");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener todos los alumnos: " . $e->getMessage());
        }
    }

    public function getOne($idalumno) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM alumnolaboratorista WHERE idalumno = ?");
            $stmt->execute([$idalumno]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el alumno: " . $e->getMessage());
        }
    }
    
    public function exists($idalumno) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM alumnolaboratorista WHERE idalumno = :idalumno");
            $stmt->bindParam(':idalumno', $idalumno);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            throw new Exception("Error al verificar existencia del alumno: " . $e->getMessage());
        }
    }

    public function create($alumno) {
        if ($this->exists($alumno['idalumno'])) {
            throw new Exception("Ya existe un alumno con este ID.");
        }

        try {
            $stmt = $this->pdo->prepare("INSERT INTO alumnolaboratorista (idalumno, alumno, apaterno, amaterno, direccion, telefono) VALUES (:idalumno, :alumno, :apaterno, :amaterno, :direccion, :telefono)");
            return $stmt->execute($alumno);
        } catch (PDOException $e) {
            throw new Exception("Error al crear el alumno: " . $e->getMessage());
        }
    }

    public function update($alumno) {
        try {
            $stmt = $this->pdo->prepare("UPDATE alumnolaboratorista SET alumno = :alumno, apaterno = :apaterno, amaterno = :amaterno, direccion = :direccion, telefono = :telefono WHERE idalumno = :idalumno");
            return $stmt->execute($alumno);
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar el alumno: " . $e->getMessage());
        }
    }

    public function delete($idalumno) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM alumnolaboratorista WHERE idalumno = :idalumno");
            return $stmt->execute(['idalumno' => $idalumno]);
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar el alumno: " . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->pdo = null;
    }
}
?>

