<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_medico = $_POST['id_medico'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $id_especialidad = $_POST['id_especialidad'];

    $sql = "UPDATE medicos SET nombre=?, apellido=?, edad=?, id_especialidad=? WHERE id_medico=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $nombre, $apellido, $edad, $id_especialidad, $id_medico);

    if ($stmt->execute()) {
        header("Location: ver_medicos.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    $id_medico = $_GET['id'];
    $sql = "SELECT * FROM medicos WHERE id_medico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_medico);
    $stmt->execute();
    $result = $stmt->get_result();
    $medico = $result->fetch_assoc();
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
    <title>Editar Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Médico</h1>
        <form method="post">
            <input type="hidden" name="id_medico" value="<?php echo $medico['id_medico']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $medico['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $medico['apellido']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $medico['edad']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad:</label>
                <select class="form-select" id="id_especialidad" name="id_especialidad" required>
                    <?php
                    while($row = $result_especialidades->fetch_assoc()) {
                        $selected = ($row["id"] == $medico['id_especialidad']) ? "selected" : "";
                        echo "<option value='".$row["id"]."' ".$selected.">".$row["nombre_especialidad"]."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Médico</button>
        </form>
        <a href="ver_medicos.php" class="btn btn-secondary mt-3">Volver a la lista de médicos</a>
    </div>
</body>
</html>