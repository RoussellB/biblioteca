<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "biblioteca");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el tipo de archivo desde la URL (por ejemplo: ?tipo=1)
$tipo_archivo = isset($_GET['tipo']) ? intval($_GET['tipo']) : 0;

if ($tipo_archivo > 0) {
    $query = $conexion->prepare("SELECT titulo, autor FROM archivos WHERE id_tipo_archivo = ?");
    $query->bind_param("i", $tipo_archivo);
    $query->execute();
    $resultado = $query->get_result();

    $archivos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $archivos[] = $fila;
    }

    $query->close();
    echo json_encode($archivos);
} else {
    echo json_encode(["error" => "Tipo de archivo no especificado o inválido."]);
}

$conexion->close();
?>
