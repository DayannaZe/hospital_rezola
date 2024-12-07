<?php
include 'db_connect.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaEspecialidad = $_POST["nueva_especialidad"];

    $sql = "INSERT INTO especialidades (nombre_especialidad) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nuevaEspecialidad);

    if ($stmt->execute()) {
        $mensaje = "<div class='alert alert-success'>Especialidad '" . htmlspecialchars($nuevaEspecialidad) . "' agregada correctamente.</div>";
    } else {
        $mensaje = "<div class='alert alert-danger'>Error al agregar la especialidad: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

// Obtener todas las especialidades
$sql = "SELECT id_especialidad, nombre_especialidad FROM especialidades ORDER BY id_especialidad";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Especialidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Gestión de Especialidades</h1>

        <div id="mensajeContainer">
            <?php echo $mensaje; ?>
        </div>

        <form id="especialidadForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="nueva_especialidad" class="form-label">Nombre de la nueva especialidad:</label>
                <input type="text" class="form-control" id="nueva_especialidad" name="nueva_especialidad" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Agregar</button>
        </form>

        <h2 class="mt-5 mb-3">Especialidades Existentes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de la Especialidad</th>
                    <tr></tr>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id_especialidad"]) . "</td>
                                <td>" . htmlspecialchars($row["nombre_especialidad"]) . "</td>
                                <td>
                                <a href='eliminar_especialidad.php?id_especialidad=".$row["id_especialidad"]."' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este paciente?\")'>Eliminar</a>
                            </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='text-center'>No hay especialidades registradas</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-secondary mt-3 w-100">Volver al inicio</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('especialidadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            
            fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                var parser = new DOMParser();
                var doc = parser.parseFromString(data, 'text/html');
                document.getElementById('mensajeContainer').innerHTML = doc.getElementById('mensajeContainer').innerHTML;
                document.querySelector('tbody').innerHTML = doc.querySelector('tbody').innerHTML;
                document.getElementById('nueva_especialidad').value = '';
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>