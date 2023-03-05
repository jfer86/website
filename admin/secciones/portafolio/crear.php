<?php
include("../../bd.php");
if ($_POST) {
    print_r($_POST);
    print_r($_FILES);
}
include("../../templates/headers.php");
?>

<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    
    <div class="mb-3">
      <label for="titulo" class="form-label">Titulo</label>
      <input type="text"
        class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
    </div>

    <div class="mb-3">
      <label for="subtitulo" class="form-label">Subtitulo:</label>
      <input type="text"
        class="form-control" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo">
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen:</label>
      <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
    </div>

    <div class="mb-3">
      <label for="desscripcion" class="form-label">Descripción:</label>
      <input type="text"
        class="form-control" name="desscripcion" id="desscripcion" aria-describedby="helpId" placeholder="Descripción">
    </div>

    <div class="mb-3">
      <label for="cliente" class="form-label">Cliente:</label>
      <input type="text"
        class="form-control" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente">
    </div>

    <div class="mb-3">
      <label for="categoria" class="form-label">Categoria:</label>
      <input type="text"
        class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoria">
    </div>

    <div class="mb-3">
      <label for="url" class="form-label">URL:</label>
      <input type="text"
        class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="URL del proyecto">
    </div>

    <button type="submit" class="btn btn-success">Agregar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
       
    </div>
    <div class="card-footer text-muted">
      
    </div>
</div>




<?php include("../../templates/footer.php"); ?>