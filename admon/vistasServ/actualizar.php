<?php
session_start();
if (!isset($_SESSION['ena'])) {
    header('location:index.php');
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/crud/crud.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/PruebaMuerta/admon/Modelos/servicios.php');
$crud = new Crud();
$Servicio = new Servicio();
$Servicio = $crud->obtenerServicio($_GET['idServicios']);
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
          <a class="dropdown-item" href="../vistasServ/ingresar.php">Insertar Servicios</a>
          <a class="dropdown-item" href="../vistasServ/mostrar.php">Ver los servicios</a>
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
        <div class="container d-flex justify-content-center">
        <form enctype="multipart/form-data" action="../crud/administrar.php" method="POST">
		<table>
		<tr>
			<td>ID a actualizar: </td>
			<td><input type="hidden" name="id" value='<?php echo $Servicio->getidServicios() ?>'></input><?php echo $Servicio->getidServicios() ?></td>
		</tr>
		<tr>
			<td>Titulo: </td>
			<td><input type="text" name="Titulo" value='<?php echo $Servicio->getTitulo() ?>'></td>
    </tr>
    <tr>
      <td>Descripcion: </td>
      <td><input type="text" name="Descripcion" value='<?php echo $Servicio->getDescripcion() ?>'></td>
    </tr>
    <tr>
      <td>Imagen: </td>
      <td>
        <input type="hidden" name="Imagen" value="<?php echo $Servicio->getImagen() ?>">
		    <?php echo "<img src='../img/Servicios/" . $Servicio->getImagen() . "' height='100'>";?>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		    <input name="uploadedfile" type="file" /> 
      </td>
    </tr>
    <tr>
      <td>
        <button type="submit" value="Guardar">Guardar</button>
        <input type="hidden" name="actualizarServicio" value="actualizarServicio"> 
      </td>
    </tr>
		</table>
  </form>
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

<!-- -->