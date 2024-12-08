<?php
include '../db_connect.php';

if (isset($_GET['id_especialidad'])) {
    $id = $_GET['id_especialidad'];
    $sql = "DELETE FROM especialidades WHERE id_especialidad = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: especialidades.php");
        exit();
    } else {
        echo "Error al eliminar la especialidad: " . $conn->error;
    }
} else {
    header("Location: especialidades.php");
    exit();
}
?>