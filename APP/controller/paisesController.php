<?php
include_once("conexion.php");
include_once("paisesmodel.php");

class PaisesController {
    private $model;

    public function __construct($db) {
        $this->model = new PaisesModel($db);
    }

    public function showEditForm($id_pais) {
        $pais = $this->model->getPaisById($id_pais);
        include("views/editpaisview.php");
    }

    public function updatePais($id, $nombre_pais) {
        $result = $this->model->updatePais($id, $nombre_pais);
        if ($result) {
            $mensaje = "El país se actualizó correctamente";
        } else {
            global $conn;
            $mensaje = "No se pudo actualizar en la BD " . mysqli_error($conn);
        }
        include("views/messageview.php");
    }
}

// Inicializamos el controlador y gestionamos las acciones
$conn = new mysqli("localhost", "root", "", "BD_INMOBILIARIA");
$paisesController = new PaisesController($conn);

if (isset($_GET['modificar'])) {
    $id = intval($_GET['id']);
    $nombre_pais = htmlspecialchars($_GET['nombre_pais']);
    $paisesController->updatePais($id, $nombre_pais);
} else {
    $id_pais = intval($_GET['id']);
    $paisesController->showEditForm($id_pais);
}
?>
