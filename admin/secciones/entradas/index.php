<?php
include("../../bd.php");
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
                <tr class="">
                    <td>1</td>
                    <td>11-02-2023</td>
                    <td>Inicar empresa</td>
                    <td>En esta fecha se inica el proyecto</td>
                    <td>imagen.jpeg</td>
                    <td>Editar | Borrar</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    
        
    </div>
    <div class="card-footer text-muted">
    
    </div>
</div>

<?php include("../../templates/footer.php"); ?>