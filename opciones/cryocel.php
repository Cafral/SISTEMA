<?php
session_start();
require_once '../config/conexion.php';

// Filtrar la entrada de búsqueda
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Consulta base para obtener todos los datos si no hay búsqueda
$query = "SELECT * FROM datos";
if (!empty($search)) {
    // Consulta de búsqueda con LIKE en las columnas
    $query .= " WHERE ID_BEBE LIKE :search OR CEDULA_MAMA LIKE :search OR CEDULA_PAPA LIKE :search OR CONTRATO LIKE :search";
}

try {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    
    // Solo se enlaza el parámetro si hay búsqueda
    if (!empty($search)) {
        $searchParam = "%$search%";
        $stmt->bindParam(':search', $searchParam);
    }
    $stmt->execute();
    
    // Obtener los resultados
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener datos: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYOCELL</title>
    <!-- Enlace a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a tu archivo CSS personalizado -->
    <link href="../css/cryocel.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">CRYOCELL</h1>
        <!-- Formulario de búsqueda -->
        <form action="" method="GET" class="d-flex mb-4">
            <input type="text" name="search" class="form-control me-2" placeholder="Buscar por id bebé, cédula o contrato" value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <div class="contenedor">
            <table class="table-bordered table-striped">
                <thead>
                    <tr>
                        <th>CONTRATO</th>
                        <th>APELLIDO MADRE</th>
                        <th>NOMBRE MADRE</th>
                        <th>CEDULA MADRE</th>
                        <th>APELLIDO PADRE</th>
                        <th>NOMBRE PADRE</th>
                        <th>CEDULA PADRE</th>
                        <th>ID BEBE</th>
                        <th>CRYOCELL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $datos): ?>
                    <tr>
                        <td><?= htmlspecialchars($datos['CONTRATO']) ?></td>
                        <td><?= htmlspecialchars($datos['APELLIDO_MAMA']) ?></td>
                        <td><?= htmlspecialchars($datos['NOMBRE_MAMA']) ?></td>
                        <td><?= htmlspecialchars($datos['CEDULA_MAMA']) ?></td>
                        <td><?= htmlspecialchars($datos['APELLIDO_PAPA']) ?></td>
                        <td><?= htmlspecialchars($datos['NOMBRE_PAPA']) ?></td>
                        <td><?= htmlspecialchars($datos['CEDULA_PAPA']) ?></td>
                        <td><?= htmlspecialchars($datos['ID_BEBE']) ?></td>
                        <td><?= htmlspecialchars($datos['CRYOCEL']) ?></td>
                        <td><a href="" class=btn>Enviar correo</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
