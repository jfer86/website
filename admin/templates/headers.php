<?php
session_start();
$url_base = "http://localhost:80/website/admin/";
if(!isset($_SESSION['usuario'])){
  header("Location:".$url_base."login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Administrador del sitio web</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
  <script type="text/javascript" charset="utf8" src=" http://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 

</head>

<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/servicios/">Servicios</a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/portafolio/">Portafolio</a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/entradas/">Entradas</a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/equipo/">Equipo</a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/configuraciones/">Configuraciones</a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/usuarios/">Usuarios</a>
        <a class="nav-item nav-link" href="<?php echo $url_base; ?>cerrar.php">Cerrar sesión</a>
      </div>
    </nav>
  </header>
  <main class="container">
    <br />

    <script>

      <?php if(isset($_GET['mensaje'])): ?>
        Swal.fire({
          icon: 'success',
          title: "<?php echo $_GET['mensaje']; ?>",
         
        })
      <?php endif; ?>  
    </script>