<?php
include '../db_connect.php';

// Lógica para buscar pacientes
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT dni, numero_paciente, nombre, apellido, codigo_historial FROM pacientes";
if ($search) {
    $sql .= " WHERE dni LIKE '%$search%'";
}
$sql .= " ORDER BY numero_paciente";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Pacientes</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar por DNI" value="<?php echo $search; ?>">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <a href="../index.php" class="btn btn-success">volver</a>
                <a href="registrar_paciente.php" class="btn btn-success">Registrar Paciente</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Número de Paciente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Historial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row["dni"]."</td>
                            <td>".$row["numero_paciente"]."</td>
                            <td>".$row["nombre"]."</td>
                            <td>".$row["apellido"]."</td>
                            <td>".$row["codigo_historial"]."</td>
                            <td>
                                <a href='registrar_paciente.php?dni=".$row["dni"]."' class='btn btn-primary btn-sm'>Editar</a>
                                <a href='mostrar_paciente.php?dni=".$row["dni"]."' class='btn btn-info btn-sm'>Mostrar</a>
                                <a href='eliminar_paciente.php?dni=".$row["dni"]."' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este paciente?\")'>Eliminar</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No se encontraron pacientes</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <body background = "imagenes/consultor.jpg"  >
</body>
</html>

