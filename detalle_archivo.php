<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'usuario', '', 'biblioteca');

// Verificar si el ID del archivo se pasa como parámetro
if (isset($_GET['id'])) {
    $id_archivo = intval($_GET['id']);

    // Consulta para obtener los detalles del archivo
    $query = $conexion->prepare("SELECT * FROM archivos WHERE id_archivo = ?");
    $query->bind_param("i", $id_archivo);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        // Devuelve el archivo en formato JSON
        echo json_encode($resultado->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Archivo no encontrado']);
    }
} else {
    echo json_encode(['error' => 'No se proporcionó un ID']);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Archivo</title>
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <main>
        <h1><?php echo htmlspecialchars($archivo['titulo']); ?></h1>
        <div class="archivo-detalle">
            <div class="imagen">
                <!-- Aquí puedes cargar una imagen representativa, si está disponible -->
                <img src="../imagenes/libro_placeholder.jpg" alt="Portada del libro">
            </div>
            <div class="detalles">
                <p><strong>Descripción:</strong> <?php echo nl2br(htmlspecialchars($archivo['descripcion'])); ?></p>
                <p><strong>Fecha:</strong> <?php echo htmlspecialchars($archivo['fecha']); ?></p>
                <p><strong>Autor:</strong> <?php echo htmlspecialchars($archivo['autor']); ?></p>
                <p><strong>Tipo:</strong> <?php echo htmlspecialchars($archivo['nombre_tipo']); ?></p>
                <p><strong>Archivo:</strong> 
                    <a href="<?php echo htmlspecialchars($archivo['ruta_archivo']); ?>" target="_blank">Descargar</a>
                </p>
            </div>
        </div>
    </main>
    <footer>
        <p>© 2024 Biblioteca Digital. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
