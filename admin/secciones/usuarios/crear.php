<?php
include("../../bd.php");

if($_POST){
    //validar que los campos requeridos no estén vacíos
    if(empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['correo'])){
        $mensaje="Por favor, complete todos los campos requeridos";
    } else {
        $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
        $password=(isset($_POST['password']))?$_POST['password']:"";
        $correo=(isset($_POST['correo']))?$_POST['correo']:"";

        $sentencia=$conexion->prepare("INSERT INTO `tbl_usuarios`(`ID`, `usuario`, `password`, `correo`)
        VALUES (NULL, :usuario, :password, :correo);");

        $sentencia->bindParam(':usuario',$usuario);
        $sentencia->bindParam(':password',$password);
        $sentencia->bindParam(':correo',$correo);
        $sentencia->execute();
        $mensaje="Datos agregados correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
}

include("../../templates/headers.php");
?>

<div class="card">
    <div class="card-header">
        Usuario
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre del usuario: </label>
                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre del usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Email:</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelpId" placeholder="abc@mail.com">
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