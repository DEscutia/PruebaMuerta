<?php
require 'crud/conexion.php';
if(isset($_POST['buttonSave'])) {
    $conn=Db::conectar();
    $insert = $conn->prepare('insert into Usuarios values(NULL,:Nombre, :NombrUsuario, :Contrasenia)');
    $insert->bindValue('Nombre', $_POST['fullName']);
    $insert->bindValue('NombrUsuario', $_POST['username']);
	$insert->bindValue('Contrasenia', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$insert->execute();
	header('location:main.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="fullName">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="Save" name="buttonSave">
                </td>
            </tr>
        </table>
</body>
</html>