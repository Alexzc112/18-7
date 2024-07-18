<?php
include_once("conexion.php");
include_once("app/model/actualizaFotoModel.php");

class ActualizaFotoController {
    private $model;

    public function __construct() {
        $this->model = new ActualizaFotoModel($GLOBALS['conn']);
    }

    public function uploadFoto() {
        if(isset($_FILES["foto1"])) {
            $file = $_FILES["foto1"];
            $nombre = $file['name'];
            $tipo = $file['type'];
            $ruta_provisional = $file["tmp_name"];
            $id_propiedad = intval($_POST['id_propiedad']);

            if($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif'){
                $reporte = "El archivo no es una imagen";
            } else {
                $ruta = 'fotos/'.$id_propiedad;
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $ruta_destino = $ruta.'/'.$nombre;
                move_uploaded_file($file['tmp_name'], $ruta_destino);

                $propiedad = $this->model->getPropiedadById($id_propiedad);
                $foto_a_borrar = $propiedad['url_foto_principal'];

                if($this->model->updateFotoPrincipal($id_propiedad, $ruta_destino)) {
                    if ($foto_a_borrar && file_exists($foto_a_borrar)) {
                        unlink($foto_a_borrar);
                    }
                    $reporte = "La foto se actualizó correctamente";
                } else {
                    $reporte = "No se pudo actualizar la imagen de la publicación";
                }
            }

            echo "<script>alert('$reporte'); window.location.href = 'index.php';</script>";
        }
    }

    public function index() {
        include("app/view/admin/propiedades/uploadFoto.php");
    }
}
?>
