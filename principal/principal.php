<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido al sistema, <?= $_SESSION['usuario'] ?>!</h2>
        <br>
        <h2>Escoja una opcion</h2>
            <div id=contenedor_opciones>
                <div class="row">
                <div class="col-md-6 text-center" id="contenedor">
                    <a href="../opciones/cryocel.php"><img src="../img/CRYOCEL.jpg" alt="cryocell international" class="img-fluid"></a>
                </div>
                <div class="col-md-6 text-center" id="contenedor">
                    <a href="../opciones/automundial.php"><img src="../img/AUTOMUNDIAL.jpg" alt="automundial somos mas que llantas" class="img-fluid"></a>
                </div>
                <div class="col-md-6 text-center" id="contenedor">
                    <a href="../opciones/vozandes.php"><img src="../img/VOZANDES.jpg" alt="hospital vozandes quito" class="img-fluid"></a>
                </div>
                <div class="col-md-6 text-center" id="contenedor">
                    <a href="../opciones/azuayo.php"><img src="../img/AZUAYO.jpg" alt="jardin azuayo" class="img-fluid"></a>
                </div>
                </div>
            </div>
    </div>
</body>
</html>
