<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $id_especialidad = $_POST['id_especialidad'];

    $sql = "INSERT INTO medicos (nombre, apellido, edad, id_especialidad) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nombre, $apellido, $edad, $id_especialidad);

    if ($stmt->execute()) {
        header("Location: ver_medicos.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$sql_especialidades = "SELECT id, nombre_especialidad FROM especialidades";
$result_especialidades = $conn->query($sql_especialidades);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Agregar Médico</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad:</label>
                <select class="form-select" id="id_especialidad" name="id_especialidad" required>
                    <?php
                    while($row = $result_especialidades->fetch_assoc()) {
                        echo "<option value='".$row["id"]."'>".$row["nombre_especialidad"]."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Médico</button>
        </form>
        <a href="ver_medicos.php" class="btn btn-secondary mt-3">Volver a la lista de médicos</a>
    </div>
</body>
</html>