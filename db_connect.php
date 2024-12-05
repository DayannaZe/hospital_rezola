<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pacientes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function getNextPatientNumber($conn) {
    $sql = "SELECT MAX(numero_paciente) as max_num FROM pacientes";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return ($row['max_num'] ?? 0) + 1;
}

function updatePatientNumbers($conn) {
    $sql = "SET @count = 0; UPDATE pacientes SET numero_paciente = @count:= @count + 1 ORDER BY dni";
    $conn->multi_query($sql);
    while ($conn->next_result()) {;} // clear multi_query
}
?>

