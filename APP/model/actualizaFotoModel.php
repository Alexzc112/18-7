<?php
class ActualizaFotoModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPropiedadById($id_propiedad) {
        $query = "SELECT * FROM propiedades WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_propiedad);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateFotoPrincipal($id_propiedad, $ruta_foto) {
        $query = "UPDATE propiedades SET url_foto_principal = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $ruta_foto, $id_propiedad);
        return $stmt->execute();
    }
}
?>
