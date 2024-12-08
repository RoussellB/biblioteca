<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotografias - Biblioteca Digital</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="breadcrumb">
        <a href="../index.php" class="logo">
            <i class="fas fa-book-reader"></i>
        </a>
        <div class="breadcrumb-items">
            <a href="../index.php">Página principal</a>
            <span>></span>
            <span>Fotografias</span>
        </div>
        <button class="share-btn">
            <i class="fas fa-share-alt"></i>
        </button>
    </nav>

    <main>
        <h1>Fotografias</h1>

        <div class="filter-tabs">
            <button class="active">Colecciones</button>
            <button>Por autor</button>
            <button>Por título</button>
            <button>Por materia</button>
        </div>

        <section class="collections">
            <h2>Colecciones de esta comunidad</h2>
            
            <div class="collection-list">
                
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 Biblioteca Digital. Todos los derechos reservados.</p>
    </footer>
    <script>
    fetch('../obtener_archivos.php?tipo=3') // Cambia "tipo" según lo que desees cargar (1=libros, 2=manuscritos, etc.)
        .then(response => response.json())
        .then(data => {
            const collectionList = document.querySelector('.collection-list');
            data.forEach(archivo => {
                // Crear el contenedor principal del ítem
                const div = document.createElement('div');
                div.classList.add('item');

                // Crear el enlace al archivo
                const link = document.createElement('a');
                link.href = '#'; // Cambia esta ruta al destino real del archivo
                link.textContent = archivo.titulo;
                link.classList.add('item-title'); // Clase para estilo

                // Crear el párrafo con el autor
                const author = document.createElement('p');
                author.textContent = `Autor: ${archivo.autor}`;
                author.classList.add('item-author'); // Clase para estilo

                // Añadir elementos al contenedor principal
                div.appendChild(link);
                div.appendChild(author);
                collectionList.appendChild(div);
            });
        })
        .catch(error => console.error('Error al cargar los manuscritos:', error));
</script>
</body>
</html>