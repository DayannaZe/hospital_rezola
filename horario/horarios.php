<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $id_medico = $_POST['id_medico'];

    $sql = "INSERT INTO horarios (fecha, hora_inicio, hora_fin, id_medico) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $fecha, $hora_inicio, $hora_fin, $id_medico);

    if ($stmt->execute()) {
        header("Location: ver_horarios.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$sql_medicos = "SELECT m.id_medico, m.nombre, m.apellido, e.nombre_especialidad 
                FROM medicos m 
                JOIN especialidades e ON m.id_especialidad = e.id_especialidad";
$result_medicos = $conn->query($sql_medicos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Horario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Agregar Horario</h1>
        <form method="post">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="hora_inicio" class="form-label">Hora de Inicio:</label>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
            </div>
            <div class="mb-3">
                <label for="hora_fin" class="form-label">Hora de Fin:</label>
                <input type="time" class="form-control" id="hora_fin" name="hora_fin" required>
            </div>
            <div class="mb-3">
                <label for="id_medico" class="form-label">Médico:</label>
                <select class="form-select" id="id_medico" name="id_medico" required>
                    <?php
                    while($row = $result_medicos->fetch_assoc()) {
                        echo "<option value='".$row["id_medico"]."'>".$row["nombre"]." ".$row["apellido"]." - ".$row["nombre_especialidad"]."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Horario</button>
        </form>
        <a href="ver_horarios.php" class="btn btn-secondary mt-3">Volver a la lista de horarios</a>
    </div>
</body>
</html>