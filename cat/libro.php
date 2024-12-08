<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros y Monografías - Biblioteca Digital</title>
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
            <span>Libros y monografías</span>
        </div>
        <button class="share-btn">
            <i class="fas fa-share-alt"></i>
        </button>
    </nav>

    <main>
        <h1>Libros y monografías</h1>

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
        <script>
    // Función para cargar la lista inicial de libros
    function cargarListaLibros() {
        fetch('../obtener_archivos.php?tipo=1') // Cambia "tipo=1" para cargar los libros
            .then(response => response.json())
            .then(data => {
                const collectionList = document.querySelector('.collection-list');
                collectionList.innerHTML = ''; // Limpia la lista actual

                data.forEach(archivo => {
                    // Crear el contenedor principal del ítem
                    const div = document.createElement('div');
                    div.classList.add('item');

                    // Crear el enlace al archivo
                    const link = document.createElement('a');
                    link.href = '../detalle_archivo.php'; // No recarga la página
                    link.textContent = archivo.titulo;
                    link.classList.add('item-title'); // Clase para estilo
                    link.dataset.id = archivo.id_archivo; // Almacena el ID del archivo

                    // Crear el párrafo con el autor
                    const author = document.createElement('p');
                    author.textContent = `Autor: ${archivo.autor}`;
                    author.classList.add('item-author'); // Clase para estilo

                    // Añadir un evento de clic al enlace
                    link.addEventListener('click', function (e) {
                        e.preventDefault(); // Evita la navegación
                        cargarDetalleLibro(archivo.id_archivo); // Carga los detalles del libro
                    });

                    // Añadir elementos al contenedor principal
                    div.appendChild(link);
                    div.appendChild(author);
                    collectionList.appendChild(div);
                });
            })
            .catch(error => console.error('Error al cargar los libros:', error));
    }

    // Función para cargar los detalles de un libro
    function cargarDetalleLibro(id) {
        fetch(`../detalle_archivo.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                const collectionList = document.querySelector('.collection-list');

                // Verificar si hay un error
                if (data.error) {
                    collectionList.innerHTML = `<p>${data.error}</p>`;
                    return;
                }

                // Actualizar dinámicamente el contenido con los detalles del libro
                collectionList.innerHTML = `
                    <div class="detalle-libro">
                        <h2>${data.titulo}</h2>
                        <p><strong>Autor:</strong> ${data.autor}</p>
                        <p><strong>Descripción:</strong> ${data.descripcion}</p>
                        <p><strong>Fecha:</strong> ${data.fecha}</p>
                        <p><strong>Ruta del archivo:</strong> 
                            <a href="${data.ruta_archivo}" target="_blank">Descargar</a>
                        </p>
                    </div>
                `;
            })
            .catch(error => console.error('Error al cargar los detalles del libro:', error));
    }

    // Llamar a la función inicial para cargar la lista de libros
    cargarListaLibros();
</script>

    </main>

    <footer>
        <p>© 2024 Biblioteca Digital. Todos los derechos reservados.</p>
    </footer>
</body>
</html>