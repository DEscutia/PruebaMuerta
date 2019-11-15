<?php
session_start();
if(!isset($_SESSION['ena'])){
    header('location:index.php');
}
require 'crud/conexion.php';
$conn=Db::conectar();
$stmt = $conn->prepare('select * from Usuarios where NombrUsuario = :username');
$stmt->bindValue('username', $_SESSION['username']);
$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_OBJ);
$id = $account->idUsuarios;
$user = $account->NombrUsuario;
$nom = $account->Nombre;

if(isset($_POST['buttonSave'])) {
    $stmt = $conn->prepare('update Usuarios set Contrasenia = :password,
    Nombre = :fullName, NombrUsuario = :username where idUsuarios = :id');
	$stmt->bindValue('username', $_POST['username']);
	$stmt->bindValue('password', $_POST['password'] == '' ? $account->Contrasenia : password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindValue('fullName', $_POST['fullName']);
    $stmt->bindValue('id', $_POST['id']);
	$stmt->execute();
	header('location:main.php?action=succesUpdate');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<form method="post">
        <table>
            <tr>
                <td>Id</td>
                <td>
                    <?php echo $id; ?>
                    <input type="hidden" name="id"
                        value="<?php echo $id; ?>">
                </td>
            </tr>
            <tr>
                <td>Nombre de usuario:</td>
                <td>
                    <input type="text" name="username"
                        value="<?php echo $user; ?>">
                </td>
            </tr>
            <tr>
                <td>Contraseña:</td>
                <td>
                    <input type="password" name="password" >
                </td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td>
                    <input type="text" name="fullName" value="<?php echo $nom; ?>">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="Guardar" name="buttonSave">
                    <a href="main.php">Salir</a>
                </td>
            </tr>
        </table>
</body>
</html>