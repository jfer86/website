<?php
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("SELECT imagen FROM `tbl_equipo` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($registro["imagen"])){
        if(file_exists("../../../assets/img/team/".$registro["imagen"])){
            unlink("../../../assets/img/team/".$registro["imagen"]);
        }
    }
    $sentencia = $conexion->prepare("DELETE FROM `tbl_equipo` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
    $mensaje = "Datos eliminados correctamente";
    header("Location: index.php?mensaje=$mensaje");
    
}

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
                        <th scope="col">Nombre</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Redes sociales</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaEntradas as $registros) { ?>
                        <tr class="">
                            <td><?php echo $registros['ID']; ?></td>
                            <td><img width="50" src="../../../assets/img/team/<?php echo $registros['imagen']; ?>" /></td>
                            <td><?php echo $registros['nombrecompleto']; ?></td>
                            <td><?php echo $registros['puesto']; ?></td>
                            <td>
                                <?php echo $registros['twitter']; ?>
                                <br><?php echo $registros['facebook']; ?>
                                <br><?php echo $registros['linkedin']; ?>
                            </td>
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
        Footer
    </div>
</div>

<?php include("../../templates/footer.php"); ?>