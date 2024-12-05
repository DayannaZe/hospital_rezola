<?php
include 'db_connect.php';

// Obtener la semana actual
$week_start = date('Y-m-d', strtotime('this week monday'));
$week_end = date('Y-m-d', strtotime('this week sunday'));

// Obtener especialidades
$sql_especialidades = "SELECT * FROM especialidades";
$result_especialidades = $conn->query($sql_especialidades);

// Obtener horarios de la semana
$sql_horarios = "SELECT h.*, d.nombre as doctor_nombre, e.nombre as especialidad_nombre 
                 FROM horarios h 
                 JOIN doctores d ON h.doctor_id = d.id 
                 JOIN especialidades e ON d.especialidad_id = e.id 
                 WHERE h.fecha BETWEEN '$week_start' AND '$week_end'
                 ORDER BY h.fecha, h.hora_inicio";
$result_horarios = $conn->query($sql_horarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios de la Semana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Horarios de la Semana</h1>
        <div class="mb-3">
            <a href="editar_horario.php" class="btn btn-primary">Editar Horario</a>
        </div>
        <div class="mb-3">
            <h2>Filtrar por Especialidad</h2>
            <form action="" method="GET">
                <select name="especialidad" class="form-select mb-2">
                    <option value="">Todas las especialidades</option>
                    <?php
                    while($row = $result_especialidades->fetch_assoc()) {
                        echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </form>
        </div>
        <table class="table table-striped">
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
                while($row = $result_horarios->fetch_assoc()) {
                    echo "<tr>
                        <td>".date('d/m/Y', strtotime($row['fecha']))."</td>
                        <td>".date('H:i', strtotime($row['hora_inicio']))." - ".date('H:i', strtotime($row['hora_fin']))."</td>
                        <td>".$row['especialidad_nombre']."</td>
                        <td>".$row['doctor_nombre']."</td>
                        <td>".$row['pacientes_esperados']."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

