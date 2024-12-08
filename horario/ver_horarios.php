<?php
include '../db_connect.php';

$sql_dias = "SELECT h.id, h.fecha, h.hora_inicio, h.hora_fin, m.nombre, m.apellido, e.nombre_especialidad
             FROM horarios h
             JOIN medicos m ON h.id_medico = m.id_medico
             JOIN especialidades e ON m.id_especialidad = e.id_especialidad
             ORDER BY h.fecha, h.hora_inicio";
$result_dias = $conn->query($sql_dias);

$sql_especialidades = "SELECT id_especialidad, nombre_especialidad FROM especialidades";
$result_especialidades = $conn->query($sql_especialidades);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver al Inicio</a>
        
        <h1 class="mb-4">Horarios</h1>
        <div class="mb-3">
            <button id="btnDias" class="btn btn-primary">Ver por días</button>
            <button id="btnEspecialidades" class="btn btn-primary">Ver por especialidades</button>
        </div>
        <a href="horarios.php" class="btn btn-success mb-3">Agregar Horario</a>
        
        <div id="vistaDias">
            <h2 class="mt-4">Horarios por días</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Médico</th>
                        <th>Especialidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_dias->num_rows > 0) {
                        while($row = $result_dias->fetch_assoc()) {
                            echo "<tr>
                                    <td>".$row["fecha"]."</td>
                                    <td>".$row["hora_inicio"]."</td>
                                    <td>".$row["hora_fin"]."</td>
                                    <td>".$row["nombre"]." ".$row["apellido"]."</td>
                                    <td>".$row["nombre_especialidad"]."</td>
                                    <td>
                                        <a href='editar_horario.php?id=".$row["id"]."' class='btn btn-sm btn-warning'>Editar</a>
                                        <a href='eliminar_horario.php?id=".$row["id"]."' class='btn btn-sm btn-danger' onclick='return confirm(\"¿Está seguro de eliminar este horario?\")'>Eliminar</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay horarios registrados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="vistaEspecialidades" class="hidden">
            <h2 class="mt-4">Horarios por especialidades</h2>
            <?php
            if ($result_especialidades->num_rows > 0) {
                while($esp = $result_especialidades->fetch_assoc()) {
                    echo "<h3 class='mt-3'>".$esp["nombre_especialidad"]."</h3>";
                    $sql_horarios_esp = "SELECT h.id, h.fecha, h.hora_inicio, h.hora_fin, m.nombre, m.apellido
                                         FROM horarios h
                                         JOIN medicos m ON h.id_medico = m.id_medico
                                         WHERE m.id_especialidad = ".$esp["id_especialidad"]."
                                         ORDER BY h.fecha, h.hora_inicio";
                    $result_horarios_esp = $conn->query($sql_horarios_esp);
                    
                    echo "<table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                    <th>Médico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>";
                    
                    if ($result_horarios_esp->num_rows > 0) {
                        while($row = $result_horarios_esp->fetch_assoc()) {
                            echo "<tr>
                                    <td>".$row["fecha"]."</td>
                                    <td>".$row["hora_inicio"]."</td>
                                    <td>".$row["hora_fin"]."</td>
                                    <td>".$row["nombre"]." ".$row["apellido"]."</td>
                                    <td>
                                        <a href='editar_horario.php?id=".$row["id"]."' class='btn btn-sm btn-warning'>Editar</a>
                                        <a href='eliminar_horario.php?id=".$row["id"]."' class='btn btn-sm btn-danger' onclick='return confirm(\"¿Está seguro de eliminar este horario?\")'>Eliminar</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay horarios registrados para esta especialidad</td></tr>";
                    }
                    
                    echo "</tbody></table>";
                }
            } else {
                echo "<p>No hay especialidades registradas</p>";
            }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnDias = document.getElementById('btnDias');
            const btnEspecialidades = document.getElementById('btnEspecialidades');
            const vistaDias = document.getElementById('vistaDias');
            const vistaEspecialidades = document.getElementById('vistaEspecialidades');

            btnDias.addEventListener('click', function() {
                vistaDias.classList.remove('hidden');
                vistaEspecialidades.classList.add('hidden');
            });

            btnEspecialidades.addEventListener('click', function() {
                vistaDias.classList.add('hidden');
                vistaEspecialidades.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>