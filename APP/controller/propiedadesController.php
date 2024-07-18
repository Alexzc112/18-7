<?php
session_start();

if (!$_SESSION['usuarioLogeado']) {
    header("Location:login.php");
    exit;
}

include("conexion.php");
include("propiedadesmodel.php");

$id_propiedad = $_GET['id'];
$propiedad = obtenerPropiedadPorId($conn, $id_propiedad);

$resultado_tipos = obtenerTiposPropiedades($conn);
$resultado_paises = obtenerPaises($conn);
$resultado_ciudades = obtenerCiudadesPorPais($conn, $propiedad['pais'], $propiedad);

if (isset($_POST['actualizar'])) {
    if (actualizarPropiedad($conn, $id_propiedad, $_POST)) {
        // Actualización exitosa
        if ($_POST['fotoPrincipalActualizada'] == "si") {
            include("actualizar-foto-principal.php");
        }

        if ($_POST['fotosGaleriaActualizada'] == "si") {
            $id_ultima_propiedad = $id_propiedad;
            include("procesar-fotos-galeria.php");
        }

        $idsFotos =  $_POST['fotosAEliminar'];
        if ($idsFotos != "") {
            include("eliminar-fotos-de-galeria.php");
        }

        $mensaje = "La propiedad se actualizó correctamente";
    } else {
        $mensaje = "No se pudo actualizar en la BD: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAPI - ADMIN</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
    <script>
        function muestraselect(str) {
            var conexion;

            if (str == "") {
                document.getElementById("ciudad").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                conexion = new XMLHttpRequest();
            }

            conexion.onreadystatechange = function() {
                if (conexion.readyState == 4 && conexion.status == 200) {
                    document.getElementById("ciudad").innerHTML = conexion.responseText;
                }
            }

            conexion.open("GET", "ciudad.php?c=" + str, true);
            conexion.send();
        }
    </script>
</head>

<body>
    <?php include("header.php"); ?>
    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>
        <div class="contenedor-principal">
            <div id="actualizar-propiedad">
                <h2>Actualizar propiedad</h2>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                    <!-- Campos de formulario -->
                    <input type="submit" value="Actualizar Datos" name="actualizar" class="btn-accion">
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($_POST['actualizar'])) : ?>
        <script>
            alert("<?php echo $mensaje ?>");
            window.location.href = 'listado-propiedades.php';
        </script>
    <?php endif ?>

    <script src="script.js"></script>
    <script src="subirFoto.js"></script>
    <script src="scriptFotosNuevas.js"></script>
</body>

</html>


