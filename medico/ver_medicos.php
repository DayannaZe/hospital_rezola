<?php
include '../db_connect.php';

$sql = "SELECT m.id_medico, m.nombre, m.apellido, m.edad, e.nombre_especialidad 
        FROM medicos m 
        JOIN especialidades e ON m.id_especialidad = e.id_especialidad";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Médicos</h1>
        <a href="agregar_medico.php" class="btn btn-primary mb-3">Agregar Médico</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["id_medico"]."</td>
                                <td>".$row["nombre"]."</td>
                                <td>".$row["apellido"]."</td>
                                <td>".$row["edad"]."</td>
                                <td>".$row["nombre_especialidad"]."</td>
                                <td>
                                    <a href='editar_medico.php?id=".$row["id_medico"]."' class='btn btn-sm btn-warning'>Editar</a>
                                    <a href='eliminar_medico.php?id=".$row["id_medico"]."' class='btn btn-sm btn-danger' onclick='return confirm(\"¿Está seguro de eliminar este médico?\")'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay médicos registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Volver al Inicio</a>
    </div>
</body>
</html>