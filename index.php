<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link rel="stylesheet" href="css/sytle.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/digital.jpeg" alt="Ministerio de Cultura">
            <img src="img/digital.jpeg" alt="Biblioteca Nacional">
        </div>
        <nav>
            <a href="#">BNP digital</a>
            <a href="#">Acerca de la BNP</a>
            <a href="#">Condiciones de uso</a>
            <a href="RESULTADOSROUSSELL.pdf" target="_blank">Guía de acceso</a>
            <a href="#">Contacto</a>
        </nav>
    </header>

    <header class="hero">
        <div class="hero-content">
            <h1>Biblioteca Digital</h1>
            <div class="search-box">
                <input type="text" placeholder="Libros, manuscritos, fotografías, colecciones, música...">
                <button>Buscar</button>
            </div>
        </div>
    </header>

    <main>
        <section class="categorias">
            <a href="cat/libro.php">
                <div href="libro.php" class="categoria">
                    <img src="img/libro.jpg" alt="Libros">
                    <h3>Libros y monografias </h3>
                </div>
            </a>
            <a href="cat/manuscritos.php">
                <div class="categoria">
                    <img src="img/manuscrito.jpg" alt="Manuscritos">
                    <h3>Manuscritos</h3>
                </div>
            </a>
            <a href="cat/fotografias.php">
                <div class="categoria">
                    <img src="img/fotografias.jpg" alt="Fotografías">
                    <h3>Fotografías</h3>
                </div>
            </a>
            <a href="cat/partitura.php">
                <div class="categoria">
                    <img src="img/partitura.jpg" alt="Colecciones">
                    <h3>Partituras</h3>
                </div>
            </a>
            
        </section>

        <section class="destacados">
            <h2>Colecciones Destacadas</h2>
            <div class="colecciones">
                <div class="coleccion">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&q=80" alt="Manuscritos Históricos">
                    <h3>Manuscritos Históricos</h3>
                    <p>Documentos originales de la época colonial</p>
                </div>
                <div class="coleccion">
                    <img src="img/fotografias.jpg" alt="Fotografías del Siglo XIX">
                    <h3>Fotografías del Siglo XIX</h3>
                    <p>Colección de fotografías históricas</p>
                </div>
                <div class="coleccion">
                    <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&q=80" alt="Literatura Peruana">
                    <h3>Literatura Peruana</h3>
                    <p>Obras literarias fundamentales</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 Biblioteca Digital. Todos los derechos reservados.</p>
    </footer>
</body>
</html>