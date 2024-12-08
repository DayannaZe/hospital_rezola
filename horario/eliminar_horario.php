<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM horarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: ver_horarios.php");
        exit();
    } else {
        echo "Error al eliminar el horario: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: ver_horarios.php");
    exit();
}
?>