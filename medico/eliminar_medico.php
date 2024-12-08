<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id_medico = $_GET['id'];
    $sql = "DELETE FROM medicos WHERE id_medico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_medico);
    
    if ($stmt->execute()) {
        header("Location: ver_medicos.php");
        exit();
    } else {
        echo "Error al eliminar el médico: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: ver_medicos.php");
    exit();
}
?>