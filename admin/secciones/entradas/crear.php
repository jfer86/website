<?php
include("../../bd.php");

if($_POST){

    // Validar que los campos requeridos no estén vacíos
    if(empty($_POST['fecha']) || empty($_POST['titulo']) || empty($_POST['descripcion'])) {
        $mensaje = "Por favor, complete todos los campos requeridos";
    } else {
        // Recepcionamos los valores del formulario
        $fecha = $_POST['fecha'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $imagen = (isset($_FILES['imagen']["name"]))? $_FILES['imagen']["name"]: "";

        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen=($imagen!="" )? $fecha_imagen->getTimestamp()."_".$imagen:"";
        $tmp_imagen=$_FILES["imagen"]["tmp_name"];
        if($tmp_imagen!=""){
            move_uploaded_file($tmp_imagen,"../../../assets/img/about/".$nombre_archivo_imagen);
        }

        $sentencia = $conexion->prepare("INSERT INTO `tbl_entradas`
        (`ID`, `fecha`, `titulo`, `descripcion`, `imagen`)
        VALUES (NULL, :fecha, :titulo, :descripcion, :imagen);");

        $sentencia->bindParam(':fecha', $fecha);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':imagen', $nombre_archivo_imagen);
        $sentencia->execute();
        $mensaje = "Datos agregados correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
}
include("../../templates/headers.php"); ?>

<div class="card">
    <div class="card-header">
        Entradas
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha">
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion: </label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>

        <?php if(isset($mensaje)): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>