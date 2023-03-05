<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $titulo = $registro['titulo'];
    $subtitulo = $registro['subtitulo'];
    $imagen = $registro['imagen'];
    $descripcion = $registro['descripcion'];
    $cliente = $registro['cliente'];
    $categoria = $registro['categoria'];
    $url = $registro['url'];
}

include("../../templates/headers.php"); ?>

<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    
    <div class="mb-3">
      <label for="titulo" class="form-label">Titulo:</label>
      <input type="text"
        class="form-control" value="<?php echo $titulo;?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
    </div>

    <div class="mb-3">
      <label for="subtitulo" class="form-label">Subtitulo:</label>
      <input type="text"
        class="form-control" value="<?php echo $subtitulo;?>" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo">
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen:</label>
      <?php echo $imagen;?>"
      <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
    </div>

    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción:</label>
      <input type="text"
        class="form-control" value="<?php echo $descripcion;?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
    </div>

    <div class="mb-3">
      <label for="cliente" class="form-label">Cliente:</label>
      <input type="text"
        class="form-control" value="<?php echo $cliente;?>" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente">
    </div>

    <div class="mb-3">
      <label for="categoria" class="form-label">Categoria:</label>
      <input type="text"
        class="form-control" value="<?php echo $categoria;?>" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoria">
    </div>

    <div class="mb-3">
      <label for="url" class="form-label">URL:</label>
      <input type="text"
        class="form-control" value="<?php echo $url;?>" name="url" id="url" aria-describedby="helpId" placeholder="URL del proyecto">
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
       
    </div>
    <div class="card-footer text-muted">
      
    </div>
</div>

<?php include("../../templates/footer.php"); ?>