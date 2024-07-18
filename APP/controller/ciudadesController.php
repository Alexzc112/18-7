<?php
include_once("conexion.php");
include_once("app/model/ciudadesModel.php");

class CiudadesController {
    private $model;

    public function __construct() {
        $this->model = new CiudadesModel($GLOBALS['conn']);
    }

    public function index() {
        if (isset($_GET['id'])) {
            $id_ciudad = intval($_GET['id']);
            $ciudad = $this->model->getCiudadById($id_ciudad);
            $paises = $this->model->getPaises();
            include("app/view/admin/ciudades/editForm.php");
        }
    }

    public function update() {
        if (isset($_GET['modificar'])) {
            $id = intval($_GET['id']);
            $id_pais = intval($_GET['pais']);
            $nombre_ciudad = htmlspecialchars($_GET['nombre_ciudad']);

            $resultado = $this->model->updateCiudad($id, $id_pais, $nombre_ciudad);

            $mensaje = $resultado ? "La ciudad se actualizó correctamente" : "No se pudo actualizar en la BD";

            echo "<script>alert('$mensaje'); window.location.href = 'index.php';</script>";
        }
    }
}
?>


