<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SAWPI - Admin</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>
        <div class="contenedor-principal">
            <div id="nuevo-pais">
                <h2>Actualizar País</h2>
                <hr>
                <div class="box-nuevo-tipo">
                    <h3>Actualizar País</h3>
                    <hr>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                        <input type="hidden" name="id" value="<?php echo $pais['id'] ?>"> 
                        <input type="text" name="nombre_pais" value="<?php echo htmlspecialchars($pais['nombre_pais']) ?>" placeholder="Nombre del país" required>
                        <input type="submit" name="modificar" value="Modificar" class="btn-accion">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>