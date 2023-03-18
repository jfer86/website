<?php
include("../../bd.php");

//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia->execute();
$listaEntradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/headers.php");
?>
<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">nombrecompleto</th>
                        <th scope="col">puesto</th>
                        <th scope="col">twitter</th>
                        <th scope="col">facebook</th>
                        <th scope="col">linkedin</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td>R1C1</td>
                        <td>Imagen.jpg</td>
                        <td>Juan</td>
                        <td>CEo</td>
                        <td>twitter</td>
                        <td>facebook</td>
                        <td>linkedin</td>
                        <td>Editar | eliminar</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

<?php include("../../templates/footer.php"); ?>