<?php
include("../../bd.php");

//eliminar registros
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("DELETE FROM `tbl_usuarios` WHERE `ID` = :ID;");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
}

//seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_usuarios`;");
$sentencia->execute();
$listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);



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
                        <th scope="col">Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaUsuarios as $registros) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $registros['usuario']; ?></td>
                            <td><?php echo $registros['correo']; ?></td>
                            <td><?php echo $registros['password']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>



<?php include("../../templates/footer.php"); ?>