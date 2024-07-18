<?php
class CiudadesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCiudadById($id_ciudad) {
        $query = "SELECT * FROM ciudades WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_ciudad);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getPaises() {
        $query = "SELECT * FROM paises";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCiudad($id, $id_pais, $nombre_ciudad) {
        $query = "UPDATE ciudades SET id_pais = ?, nombre_ciudad = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isi", $id_pais, $nombre_ciudad, $id);
        return $stmt->execute();
    }
}
?>


