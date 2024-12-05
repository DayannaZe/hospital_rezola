<?php
include 'db_connect.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $especialidad = $_POST['especialidad'];
    $doctor = $_POST['doctor'];
    $pacientes_esperados = $_POST['pacientes_esperados'];

    $sql = "INSERT INTO horarios (fecha, hora_inicio, hora_fin, especialidad, doctor, pacientes_esperados) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $fecha, $hora_inicio, $hora_fin, $especialidad, $doctor, $pacientes_esperados);
    
    if ($stmt->execute()) {
        $mensaje = "Horario guardado exitosamente.";
    } else {
        $mensaje = "Error al guardar el horario: " . $conn->error;
    }

    $stmt->close();
}

$sql_especialidades = "SELECT DISTINCT especialidad FROM horarios";
$result_especialidades = $conn->query($sql_especialidades);
$especialidades = [];
while ($row = $result_especialidades->fetch_assoc()) {
    $especialidades[] = $row['especialidad'];
}
if (empty($especialidades)) {
    $especialidades = ['Cardiología', 'Pediatría', 'Dermatología', 'Oftalmología', 'Neurología'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        form {
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .btn {
            display: inline-block;
            background: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Horario</h1>
        <?php
        if ($mensaje) {
            echo "<p>$mensaje</p>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora_inicio">Hora de Inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required>

            <label for="hora_fin">Hora de Fin:</label>
            <input type="time" id="hora_fin" name="hora_fin" required>

            <label for="especialidad">Especialidad:</label>
            <select id="especialidad" name="especialidad" required>
                <?php foreach ($especialidades as $esp): ?>
                    <option value="<?php echo htmlspecialchars($esp); ?>"><?php echo htmlspecialchars($esp); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="doctor">Doctor:</label>
            <input type="text" id="doctor" name="doctor" required>

            <label for="pacientes_esperados">Pacientes Esperados:</label>
            <input type="number" id="pacientes_esperados" name="pacientes_esperados" required>

            <button type="submit" class="btn">Guardar Horario</button>
        </form>
        <a href="ver_horarios.php" class="btn">Cancelar</a>
    </div>
</body>
</html>