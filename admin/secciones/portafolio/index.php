<?php
include("../../bd.php");

//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$listaPortafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/headers.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cliente&Categorias</th>
                        <th scope="col">acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaPortafolio as $registros) { ?>
                        <tr class="">
                            <td scope="col"><?php echo $registros['ID']; ?></td>
                            <td scope="col">
                                <h6><?php echo $registros['titulo']; ?></h6>
                                <?php echo $registros['subtitulo']; ?>
                                <br>- <?php echo $registros['url']; ?>
                            </td>
                            <td scope="col">
                                <img width="50" src="../../../assets/img/portfolio/<?php echo $registros['imagen']; ?>" />

                            </td>
                            <td scope="col"><?php echo $registros['descripcion']; ?></td>
                            <td scope="col">
                                -<?php echo $registros['categoria']; ?>
                                <br>-<?php echo $registros['cliente']; ?>

                            </td>
                            <td scope="col"><a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>

</div>

<?php include("../../templates/footer.php"); ?>