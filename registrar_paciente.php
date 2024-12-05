<?php
include 'db_connect.php';

$dni = isset($_GET['dni']) ? $_GET['dni'] : null;
$paciente = null;

if ($dni) {
    $sql = "SELECT * FROM pacientes WHERE dni = '$dni'";
    $result = $conn->query($sql);
    $paciente = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $numero_celular = $_POST['numero_celular'];
    $correo = $_POST['correo'];
    $nacionalidad = $_POST['nacionalidad'];
    $codigo_historial = $_POST['codigo_historial'];

    if ($paciente) {
        $sql = "UPDATE pacientes SET nombre='$nombre', apellido='$apellido', edad='$edad', numero_celular='$numero_celular', correo='$correo', nacionalidad='$nacionalidad', codigo_historial='$codigo_historial' WHERE dni='$dni'";
    } else {
        $numero_paciente = getNextPatientNumber($conn);
        $sql = "INSERT INTO pacientes (dni, numero_paciente, nombre, apellido, edad, numero_celular, correo, nacionalidad, codigo_historial) VALUES ('$dni', $numero_paciente, '$nombre', '$apellido', '$edad', '$numero_celular', '$correo', '$nacionalidad', '$codigo_historial')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: pacientes.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dni ? 'Editar' : 'Registrar'; ?> Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo $dni ? 'Editar' : 'Registrar'; ?> Paciente</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $paciente ? $paciente['dni'] : ''; ?>" <?php echo $paciente ? 'readonly' : ''; ?> required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $paciente ? $paciente['nombre'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $paciente ? $paciente['apellido'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $paciente ? $paciente['edad'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">Número de Celular</label>
                <input type="tel" class="form-control" id="numero_celular" name="numero_celular" value="<?php echo $paciente ? $paciente['numero_celular'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $paciente ? $paciente['correo'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo $paciente ? $paciente['nacionalidad'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="codigo_historial" class="form-label">Código de Historial</label>
                <input type="text" class="form-control" id="codigo_historial" name="codigo_historial" value="<?php echo $paciente ? $paciente['codigo_historial'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $dni ? 'Actualizar' : 'Registrar'; ?></button>
            <a href="pacientes.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

