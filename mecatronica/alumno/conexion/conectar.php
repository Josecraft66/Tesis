
<?php
class Conex {
    private $host = "185.212.70.205";
    private $db = "u205750400_jose";
    private $username = "u205750400_jose";
    private $password = "C4mPoSC*49";
    private $connection;

    public function getConnection() {
        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
