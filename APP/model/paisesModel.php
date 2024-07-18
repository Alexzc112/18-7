<?php
class PaisesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPaisById($id_pais) {
        $query = "SELECT * FROM paises WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_pais);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePais($id, $nombre_pais) {
        $query = "UPDATE paises SET nombre_pais = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $nombre_pais, $id);
        return $stmt->execute();
    }
}
?>
