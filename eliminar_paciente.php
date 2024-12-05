<?php
include 'db_connect.php';

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $sql = "DELETE FROM pacientes WHERE dni = '$dni'";
    
    if ($conn->query($sql) === TRUE) {
        updatePatientNumbers($conn);
        header("Location: pacientes.php");
        exit();
    } else {
        echo "Error al eliminar el paciente: " . $conn->error;
    }
} else {
    header("Location: pacientes.php");
    exit();
}
?>

