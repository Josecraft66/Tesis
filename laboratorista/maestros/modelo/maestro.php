<?php
// File: modelo/maestro.php

require_once dirname(__DIR__) . '/conexion/conectar.php';

class Maestro {
    private $pdo;
    private $table_name;

    public function __construct($table_name = 'maestrolaboratorista') {
        $conex = new Conex();
        $this->pdo = $conex->getConnection();
        $this->table_name = $table_name;
    }

    public function getAll() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table_name}");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener todos los maestros: " . $e->getMessage());
            return [];
        }
    }

    public function getOne($idmaestro) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table_name} WHERE idmaestro = ?");
            $stmt->execute([$idmaestro]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener un maestro: " . $e->getMessage());
            return false;
        }
    }
    
    public function exists($idmaestro) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table_name} WHERE idmaestro = :idmaestro");
            $stmt->bindParam(':idmaestro', $idmaestro);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Error al verificar existencia: " . $e->getMessage());
            return false;
        }
    }

    public function create($maestro) {
        if ($this->exists($maestro['idmaestro'])) {
            return false;
        }

        try {
            $stmt = $this->pdo->prepare("INSERT INTO {$this->table_name} (idmaestro, maestro, apaterno, amaterno, direccion, telefono) VALUES (:idmaestro, :maestro, :apaterno, :amaterno, :direccion, :telefono)");
            return $stmt->execute($maestro);
        } catch (PDOException $e) {
            error_log("Error al insertar un maestro: " . $e->getMessage());
            return false;
        }
    }

    public function delete($idmaestro) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM {$this->table_name} WHERE idmaestro = :idmaestro");
            $stmt->bindParam(':idmaestro', $idmaestro);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar al maestro: " . $e->getMessage());
            return false;
        }
    }

    public function update($maestro) {
        try {
            $stmt = $this->pdo->prepare("UPDATE {$this->table_name} SET maestro = :maestro, apaterno = :apaterno, amaterno = :amaterno, direccion = :direccion, telefono = :telefono WHERE idmaestro = :idmaestro");
            return $stmt->execute($maestro);
        } catch (PDOException $e) {
            error_log("Error al actualizar un maestro: " . $e->getMessage());
            return false;
        }
    }
}