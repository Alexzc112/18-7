<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>YEDA - Admin</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>

        <div class="contenedor-principal">
            <div id="subir-foto">
                <h2>Subir Foto Principal</h2>
                <hr>

                <div class="box-subir-foto">
                    <h3>Subir Foto Principal</h3>
                    <hr>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <label for="foto1">Seleccione una foto:</label>
                        <input type="file" name="foto1" id="foto1" class="input-entrada-texto" required>
                        <input type="hidden" name="id_propiedad" value="<?php echo htmlspecialchars($_GET['id']); ?>">
                        <input type="submit" value="Subir Foto" class="btn-accion">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

