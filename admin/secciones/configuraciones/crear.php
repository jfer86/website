<?php
include("../../bd.php");

if($_POST){
    //validar que los campos requeridos no estén vacíos
    if(empty($_POST['nombreconfiguracion']) || empty($_POST['valor'])){
        $mensaje = "Por favor, complete todos los campos requeridos";
    } else {
        //recepcionamos los datos del formulario
        $nombreconfiguracion = (isset($_POST['nombreconfiguracion'])) ? $_POST['nombreconfiguracion'] : "";
        $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

        $sentencia = $conexion->prepare("INSERT INTO `tbl_configuraciones`(`ID`, `nombreconfiguracion`, `valor`)
        VALUES (NULL, :nombreconfiguracion, :valor);");

        $sentencia->bindParam(':nombreconfiguracion', $nombreconfiguracion);
        $sentencia->bindParam(':valor', $valor);
        $sentencia->execute();
        $mensaje = "Datos guardados correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
}

include("../../templates/headers.php");
?>
<div class="card">
    <div class="card-header">
        Confiraguraciones
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre de la configuración">
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor de la configuración">
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