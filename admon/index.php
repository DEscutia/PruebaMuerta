<?php
//Esta es la ventana de logueo!
session_start();
if (isset($_SESSION['ena'])) {
  header('location:main.php');
}
require 'crud/conexion.php';
$conn = Db::conectar();
if (isset($_POST['buttonLogin'])) {
  $stmt = $conn->prepare('select * from Usuarios where NombrUsuario = :username');
  $stmt->bindValue('username', $_POST['username']);
  $stmt->execute();
  $account = $stmt->fetch(PDO::FETCH_OBJ);
  if ($account != NULL) {
    if (password_verify($_POST['password'], $account->Contrasenia)) {
      $_SESSION['ena'] = "true";
      $_SESSION['username'] = $account->NombrUsuario;
      $_SESSION['id'] = $account->idUsuarios;
      header('location:main.php');
    } else {
      $error = '¡Credenciales invalidas!';
    }
  } else {
    $error = '¡Credenciales invalidas!';
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: .75rem;
    }

    body {
      background: #007bff;
      background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .card-signin {
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
      margin-bottom: 2rem;
      font-weight: 300;
      font-size: 1.5rem;
    }

    .card-signin .card-body {
      padding: 2rem;
    }

    .form-signin {
      width: 100%;
    }

    .form-signin .btn {
      font-size: 80%;
      border-radius: 5rem;
      letter-spacing: .1rem;
      font-weight: bold;
      padding: 1rem;
      transition: all 0.2s;
    }

    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-label-group input {
      height: auto;
      border-radius: 2rem;
    }

    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-moz-placeholder {
      color: transparent;
    }

    .form-label-group input::placeholder {
      color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }

    .btn-google {
      color: white;
      background-color: #ea4335;
    }

    .btn-facebook {
      color: white;
      background-color: #3b5998;
    }

    /* Fallback for Edge
  -------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
      .form-label-group>label {
        display: none;
      }

      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }

    /* Fallback for IE
  -------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .form-label-group>label {
        display: none;
      }

      .form-label-group input:-ms-input-placeholder {
        color: #777;
      }
    }
  </style>
  <!------ Include the above in your HEAD tag ---------->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pantalla de verificacion</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <div class="text-center">
            <i class="fas fa-lock"></i>
            </div>
            <h5 class="card-title text-center">Entrar</h5>
            <form class="form-signin" method="post">
              <?php
              if (isset($error)) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "  <strong>¡Algo salio mal! </strong>" . $error;
                echo "</div>";
              }
              ?>
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Direccion de Email" name="username" required autofocus>
                <label for="inputEmail">Nombre de usuario</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password" required>
                <label for="inputPassword">Contraseña</label>
              </div>
              <!--
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
              </div>
              -->
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="buttonLogin" href="main.php">Entrar</button>
              <hr class="my-4">
              <p class="text-center">SDA Developers</p>
              <p class="text-center">INSTITUTO TECNOLOGICO SUPERIOR DEL SUR DE GUANAJUATO</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>