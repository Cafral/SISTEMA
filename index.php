<?php

session_start();

require_once 'config/conexion.php';
require_once 'login.php'

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Inicio de sesion</h2>
        <form method="POST"  id="contenedor">
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Rol</label>
                <select name="role" class="form-control">
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
</body>
</html>
