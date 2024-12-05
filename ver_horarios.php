<?php
include 'db_connect.php';

$especialidad_filtro = isset($_GET['especialidad']) ? $_GET['especialidad'] : '';

$sql = "SELECT * FROM horarios";
if (!empty($especialidad_filtro)) {
    $sql .= " WHERE especialidad = '" . $conn->real_escape_string($especialidad_filtro) . "'";
}
$sql .= " ORDER BY fecha, hora_inicio";
$result = $conn->query($sql);

$sql_especialidades = "SELECT DISTINCT especialidad FROM horarios";
$result_especialidades = $conn->query($sql_especialidades);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Horarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            background: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Horarios de esta semana</h1>
        <form action="" method="GET">
            <label for="especialidad">Filtrar por especialidad:</label>
            <select name="especialidad" id="especialidad" onchange="this.form.submit()">
                <option value="">Todas las especialidades</option>
                <?php while ($row = $result_especialidades->fetch_assoc()): ?>
                    <option value="<?php echo htmlspecialchars($row['especialidad']); ?>" <?php echo ($especialidad_filtro == $row['especialidad']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['especialidad']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Especialidad</th>
                    <th>Doctor</th>
                    <th>Pacientes Esperados</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["hora_inicio"]) . " - " . htmlspecialchars($row["hora_fin"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["especialidad"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["doctor"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["pacientes_esperados"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay horarios disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn">Volver al Inicio</a>
        <a href="editar_horario.php" class="btn">Editar Horario</a>
    </div>
</body>
</html>