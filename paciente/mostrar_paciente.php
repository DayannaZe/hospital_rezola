<?php
include 'db_connect.php';

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $sql = "SELECT * FROM pacientes WHERE dni = '$dni'";
    $result = $conn->query($sql);
    $paciente = $result->fetch_assoc();
} else {
    header("Location: pacientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles del Paciente</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $paciente['nombre'] . ' ' . $paciente['apellido']; ?></h5>
                <p class="card-text"><strong>DNI:</strong> <?php echo $paciente['dni']; ?></p>
                <p class="card-text"><strong>Número de Paciente:</strong> <?php echo $paciente['numero_paciente']; ?></p>
                <p class="card-text"><strong>Edad:</strong> <?php echo $paciente['edad']; ?></p>
                <p class="card-text"><strong>Número de Celular:</strong> <?php echo $paciente['numero_celular']; ?></p>
                <p class="card-text"><strong>Correo:</strong> <?php echo $paciente['correo']; ?></p>
                <p class="card-text"><strong>Nacionalidad:</strong> <?php echo $paciente['nacionalidad']; ?></p>
                <p class="card-text"><strong>Código de Historial:</strong> <?php echo $paciente['codigo_historial']; ?></p>
                <a href="pacientes.php" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

