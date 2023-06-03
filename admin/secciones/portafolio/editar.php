<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
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

if ($_POST) {
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $subtitulo = (isset($_POST['subtitulo'])) ? $_POST['subtitulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "";
    $categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "";
    $url = (isset($_POST['url'])) ? $_POST['url'] : "";
    
    // Validar campos requeridos
    if (empty($titulo) || empty($subtitulo) || empty($descripcion) || empty($cliente) || empty($categoria) || empty($url)) {
        $error_message = "Por favor, complete todos los campos requeridos";
    } else {
        $sentencia = $conexion->prepare("UPDATE `tbl_portafolio`
        SET
        `titulo` = :titulo,
        `subtitulo` = :subtitulo,
        `descripcion` = :descripcion,
        `cliente` = :cliente,
        `categoria` = :categoria,
        `url` = :url
        WHERE `ID` = :ID;");

        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':subtitulo', $subtitulo);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':cliente', $cliente);
        $sentencia->bindParam(':categoria', $categoria);
        $sentencia->bindParam(':url', $url);

        $sentencia->bindParam(':ID', $txtID);
        $sentencia->execute();

        if ($_FILES['imagen']['tmp_name'] != "") {

            $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
            $fecha_imagen = new DateTime();
            $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

            $tmp_imagen = $_FILES["imagen"]["tmp_name"];

            move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/" . $nombre_archivo_imagen);

            // Borrado del archivo anterior
            $sentencia = $conexion->prepare("SELECT imagen FROM `tbl_portafolio` WHERE ID = :ID");
            $sentencia->bindParam(':ID', $txtID);
            $sentencia->execute();
            $registro = $sentencia->fetch(PDO::FETCH_LAZY);

            if (isset($registro["imagen"])) {
                if(file_exists("../../../assets/img/portfolio/" . $registro["imagen"])) {
                    unlink("../../../assets/img/portfolio/" . $registro["imagen"]);
                }
            }

            $sentencia = $conexion->prepare("UPDATE `tbl_portafolio` SET `imagen` = :imagen WHERE `ID` = :ID;");
            $sentencia->bindParam(':imagen', $nombre_archivo_imagen);
            $sentencia->bindParam(':ID', $txtID);
            $sentencia->execute();
        }

        $mensaje = "Datos actualizados correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
}

include("../../templates/headers.php"); ?>

<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text" class="form-control" readonly name="txtID" id="txtID" value="<?php echo $txtID; ?>" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" value="<?php echo $titulo; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo" required>
            </div>

            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtitulo:</label>
                <input type="text" class="form-control" value="<?php echo $subtitulo; ?>" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="50" src="../../../assets/img/portfolio/<?php echo $imagen; ?>" />
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" value="<?php echo $descripcion; ?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <input type="text" class="form-control" value="<?php echo $cliente; ?>" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" class="form-control" value="<?php echo $categoria; ?>" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoria">
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL:</label>
                <input type="text" class="form-control" value="<?php echo $url; ?>" name="url" id="url" aria-describedby="helpId" placeholder="URL del proyecto">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>
