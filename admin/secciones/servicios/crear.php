<?php
include("../../bd.php");

if ($_POST) {
  // Validar que los campos requeridos no estén vacíos
  if (empty($_POST['icono']) || empty($_POST['titulo']) || empty($_POST['descripcion'])) {
    $mensaje = "Por favor, complete todos los campos requeridos";
  } else {
    // Recepcionamos los valores del formulario
    $icono = (isset($_POST['icono'])) ? $_POST['icono'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_servicios` (`ID`, `icono`, `titulo`, `descripcion`)
      VALUES (NULL, :icono, :titulo, :descripcion);");

    $sentencia->bindParam(':icono', $icono);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->execute();

    $mensaje = "Datos agregados correctamente";
    header("Location: index.php?mensaje=$mensaje");
  }
}

include("../../templates/headers.php");
?>

<div class="card">
  <div class="card-header">
    Crear servicios
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
      <div class="mb-3">
        <label for="icono" class="form-label">Icono:</label>
        <input type="icono" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">
      </div>

      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
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