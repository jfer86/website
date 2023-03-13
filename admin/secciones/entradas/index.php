<?php
include("../../bd.php");

//borrar registros
if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("SELECT imagen FROM `tbl_entradas` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro["imagen"])){
        if(file_exists("../../../assets/img/about/".$registro["imagen"])){
            unlink("../../../assets/img/about/".$registro["imagen"]);
        }

    }

    $sentencia = $conexion->prepare("DELETE FROM `tbl_entradas` WHERE ID = :ID");
    $sentencia->bindParam(':ID', $txtID);
    $sentencia->execute();
}

//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_entradas`");
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
                        <th scope="col">Fecha</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaEntradas as $registros) { ?>
                        <tr class="">
                            <td><?php echo $registros['ID']; ?></td>
                            <td><?php echo $registros['fecha']; ?></td>
                            <td><?php echo $registros['titulo']; ?></td>
                            <td><?php echo $registros['descripcion']; ?></td>
                            <td> <img width="50" src="../../../assets/img/about/<?php echo $registros['imagen']; ?>" /></td>
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