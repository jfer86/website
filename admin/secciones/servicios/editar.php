<?php

include("../../bd.php");

if (isset($_GET['txtID'])) {
    //Recuperar los datos del id que se quiere editar
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $icono = $registro['icono'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
}

if ($_POST) {
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $icono = (isset($_POST['icono'])) ? $_POST['icono'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    // Validación de campos requeridos
    $error_message = "";

    if (empty($icono)) {
        $error_message .= "El campo 'Icono' es requerido.<br>";
    }

    if (empty($titulo)) {
        $error_message .= "El campo 'Titulo' es requerido.<br>";
    }

    if (empty($descripcion)) {
        $error_message .= "El campo 'Descripcion' es requerido.<br>";
    }

    if (!empty($error_message)) {
        $mensaje = "Error: " . $error_message;
    } else {
        $sentencia = $conexion->prepare("UPDATE `tbl_servicios`
        SET
        `icono` = :icono,
        `titulo` = :titulo,
        `descripcion` = :descripcion
        WHERE `tbl_servicios`.`ID` = :ID;");

        $sentencia->bindParam(':ID', $txtID);
        $sentencia->bindParam(':icono', $icono);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':ID', $txtID);
        $sentencia->execute();
        $mensaje = "Datos actualizados correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
}

include("../../templates/headers.php"); ?>

<div class="card">
    <div class="card-header">
        Editar la información de los servicios
    </div>
    <div class="card-body">
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input readonly value="<?php echo $txtID; ?>" type="text" class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>

            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input value="<?php echo $icono; ?>" type="icono" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input value="<?php echo $titulo; ?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input value="<?php echo $descripcion; ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php"); ?>
