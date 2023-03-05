<?php
include("../../bd.php");

//Seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$listaPortafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">url</th>
                        <th scope="col">acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="col">1</td>
                        <td scope="col">Software restaurante</td>
                        <td scope="col">Software para su restaurante a la medida</td>
                        <td scope="col">imagen.jpeg</td>
                        <td scope="col">Software para su restaurante a la medida realizado con PHP</td>
                        <td scope="col">Restaurante slayer</td>
                        <td scope="col">Software</td>
                        <td scope="col">http://google.com</td>
                        <td scope="col">Editar | Eliminar</td>
                    </tr>

                </tbody>
            </table>
        </div>


    </div>

</div>

<?php include("../../templates/footer.php"); ?>