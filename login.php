<?php

require_once 'config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contrasenia = $_POST['contrasenia'] ?? '';

    if ($usuario && $contrasenia) {
        // Consulta para validar usuario y contraseña
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
    
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($usuario !== false && password_verify($contrasenia, $usuario['contrasenia'])) {
            // Asigna datos a la sesión
            $_SESSION['usuario'] = $usuario['usuario'];
    
            // Redirige a la pantalla principal
            header('Location: ../principal/principal.php');
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Por favor, completa todos los campos.";
    }

}

?>