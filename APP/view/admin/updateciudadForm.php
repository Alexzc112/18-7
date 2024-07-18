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
            <div id="nueva-ciudad">
                <h2>Actualizar Ciudad</h2>
                <hr>

                <div class="box-nuevo-tipo">
                    <h3>Actualizar Ciudad</h3>
                    <hr>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="pais">Seleccione el pais</label>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($ciudad['id']) ?>">

                        <select name="pais" id="pais" class="input-entrada-texto">
                            <?php foreach ($paises as $row): ?>
                                <option value="<?php echo htmlspecialchars($row['id']) ?>" <?php if ($row['id'] == $ciudad['id_pais']) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($row['nombre_pais']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" name="nombre_ciudad" value="<?php echo htmlspecialchars($ciudad['nombre_ciudad']) ?>" placeholder="Nombre de la Ciudad" class="input-entrada-texto" required>
                        <input type="submit" value="Modificar" class="btn-accion">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
