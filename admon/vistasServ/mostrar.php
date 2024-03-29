<?php
session_start();
if (!isset($_SESSION['ena'])) {
    header('location:index.php');
}
//incluye la clase Libro y CrudLibro
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/Modelos/servicios.php');
$crud = new Crud();
$servicio = new Servicio();
//obtiene todos los libros con el método mostrar de la clase crud
$listaServicios=[];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Consola de Administracion - Servicios</title>
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../main.php">Consola de Administracion de contenido</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="../change_profile.php">Editar Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../main.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Paginas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Servicios:</h6>
          <a class="dropdown-item" href="ingresar.php">Insertar Servicios</a>
          <a class="dropdown-item" href="mostrar.php">Ver los servicios</a>
          <h6 class="dropdown-header">Obituarios:</h6>
          <a class="dropdown-item" href="../vistasObi/ingresar.php">Insertar Obituarios</a>
          <a class="dropdown-item" href="../vistasObi/mostrar.php">Ver los Obituarios</a>
          <h6 class="dropdown-header">Ataudes:</h6>
          <a class="dropdown-item" href="../vistasAta/ingresar.php">Insertar Ataudes</a>
          <a class="dropdown-item" href="../vistasAta/mostrar.php">Ver los Ataudes</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Otras paginas:</h6>
          <a class="dropdown-item" href="404.html">Acerca de...</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../register.php">
          <i class="fas fa-fw fa-users-cog"></i>
          <span>Registrar usuario</span></a>
      </li>
      <li class="nav-item">
        <a href="tables.html" class="nav-link  dropdown" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-table"></i>
          <span>Salir</span></a>
      </li>
    </ul>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="main.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Servicios</li>
        </ol>
        <!-- Page Content -->
        <?php
        $listaservicios = $crud->mostrarServicios();
        if(count($listaservicios)==0){
            echo "<div class='alert alert-info ml-auto' role='alert'>";
            echo "<strong>¡Atencion! </strong>" . "Ningun servicio registrado";
            echo "</div>";
        }
        ?>
        <div class="container d-flex justify-content-center">
		<table border=1>
			<thead>
				<td>Titulo</td>
				<td>Descripcion</td>
				<td>Imagen</td>
				<td>Actualizar</td>
				<td>Eliminar</td>
			</thead>
			<tbody>
				<?php foreach ($listaservicios as $servicio) { ?>
					<tr>
						<td><?php echo $servicio->getTitulo() ?></td>
						<td><?php echo $servicio->getDescripcion() ?></td>
						<td><?php echo "<img src='../img/Servicios/" . $servicio->getImagen() . "'height='100' >";?></td>
						<td><a href="actualizar.php?idServicios=<?php echo $servicio->getidServicios() ?>">Actualizar</a> </td>
						<td><a href="../crud/administrar.php?idServicios=<?php echo $servicio->getidServicios() ?>&acction=eServicio&ruta=<?php echo $servicio->getImagen() ?>">Eliminar</a> </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
      </div>
      <!-- /.container-fluid -->
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © SDA Developers 2019</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Estas apunto de irte. Selecciona Salir si estas listo para irte.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../main.php?action=logout">Salir</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>
</body>
</html>