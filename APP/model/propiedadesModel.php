<?php
function obtenerPropiedadPorId($conn, $id_propiedad)
{
    //Obtenemos la propiedad en base al id que recibimos por GET
    $query = "SELECT * FROM propiedades WHERE id='$id_propiedad'";
    $resultado_propiedad = mysqli_query($conn, $query);
    $propiedad = mysqli_fetch_assoc($resultado_propiedad);
    return $propiedad;
}

function obtenerFotosGaleriaDePropiedad($conn, $id_propiedad)
{
    //Armamos el query para seleccionar las fotos
    $query = "SELECT * FROM fotos WHERE id_propiedad='$id_propiedad'";
    $galeria = mysqli_query($conn, $query);
    return $galeria;
}

function obtenerTiposPropiedades($conn)
{
    //Armamos el query para seleccionar los tipos
    $query = "SELECT * FROM tipos";
    $resultado_tipos = mysqli_query($conn, $query);
    return $resultado_tipos;
}

function obtenerPaises($conn)
{
    //Armamos el query para seleccionar los paises
    $query = "SELECT * FROM paises";
    $resultado_paises = mysqli_query($conn, $query);
    return $resultado_paises;
}

function obtenerCiudadesPorPais($conn, $id_pais, $propiedad)
{
    //Armamos el query para seleccionar las ciudades
    $query = "SELECT * FROM ciudades WHERE id_pais='$id_pais'";
    $resultado_ciudades = mysqli_query($conn, $query);
    return $resultado_ciudades;
}

function actualizarPropiedad($conn, $id_propiedad, $datos_propiedad)
{
    //tomamos los datos que vienen del formulario
    $id_propiedad = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones = $_POST['habitaciones'];
    $banios = $_POST['banios'];
    $pisos = $_POST['pisos'];
    $garage = $_POST['garage'];
    $dimensiones = $_POST['dimensiones'];
    $precio = $_POST['precio'];
    $moneda = $_POST['moneda'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $propietario = $_POST['nombre_propietario'];
    $telefono_propietario = $_POST['telefono_propietario'];

    //armamos el query para actualizar la propiedad
    $query = "UPDATE propiedades SET
     titulo='$titulo', 
     descripcion='$descripcion', 
     tipo='$tipo', 
     estado='$estado', 
     ubicacion='$ubicacion', 
     habitaciones='$habitaciones', 
     banios='$banios', 
     pisos='$pisos', 
     garage='$garage', 
     dimensiones='$dimensiones', 
     precio='$precio',
     moneda='$moneda', 
     pais='$pais',
     ciudad='$ciudad',
     propietario='$propietario',
     telefono_propietario='$telefono_propietario'
     WHERE id='$id_propiedad'";

    //actualizamos en la tabla propiedades
    if (mysqli_query($conn, $query)) { //Se actualizó correctamente
        return true;
    } else {
        return false;
    }
}
?>

