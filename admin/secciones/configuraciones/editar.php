<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_configuraciones` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombreconfiguracion = $registro['nombreconfiguracion'];
    $valor = $registro['valor'];
        
}

if($_POST){
    // Validar que los campos requeridos no estén vacíos
    if (empty($_POST['nombreconfiguracion']) || empty($_POST['valor'])) {
        $mensaje = "Por favor, complete todos los campos requeridos";
    } else {
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $nombreconfiguracion = (isset($_POST['nombreconfiguracion'])) ? $_POST['nombreconfiguracion'] : "";
        $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

        $sentencia = $conexion->prepare("UPDATE `tbl_configuraciones`
        SET `nombreconfiguracion`=:nombreconfiguracion,`valor`=:valor WHERE ID = :ID");

        $sentencia->bindParam(':ID', $txtID);
        $sentencia->bindParam(':nombreconfiguracion', $nombreconfiguracion);
        $sentencia->bindParam(':valor', $valor);
        $sentencia->execute();
        $mensaje = "Datos actualizados correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
}

include("../../templates/headers.php");
?>
<div class="card">
    <div class="card-header">
        Configuraciones
    </div>
    <div class="card-body">
        <form action="" method="post">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input readonly type="text" class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo $nombreconfiguracion;?>" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre de la configuración" required>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" value="<?php echo $valor;?>" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor de la configuración" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>
