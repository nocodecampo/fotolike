<?php
// Conexión a la base de datos
include 'dbconnect.php';
// Preparamos la consulta de las fotos y el número de likes
$stmt = $conn->prepare("SELECT fotos.id, fotos.titulo, fotos.foto, usuarios.nombre, COUNT(likes.id) as likes FROM fotos LEFT JOIN likes ON fotos.id = likes.idFoto INNER JOIN usuarios ON fotos.idUsuario = usuarios.id GROUP BY fotos.id");
// Ejecutamos la consulta
$stmt->execute();
// Obtenemos las fotos
$fotos = $stmt->fetchAll();
// Cerramos la conexión
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería brutal</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <h1>Galería brutal</h1>
        <nav>
            <a href="nueva-foto.php">Subir foto</a>
            <a href="login.php">Iniciar sesión</a>
            <a href="registro.php">Registrarse</a>
        </nav>
    </header>
    <main>
        <section class="galeria">
            <?php foreach ($fotos as $foto): ?>
                <article>
                    <h2><?php echo $foto['titulo']; ?></h2>
                    <img src="<?php echo $foto['foto']; ?>" alt="<?php echo $foto['titulo']; ?>">
                    <div class="info">
                    <p>Subida por: <?php echo $foto['nombre']; ?></p>
                    <p>Likes: <?php echo $foto['likes']; ?></p>
                    </div>
                    <a href="like.php?idFoto=<?php echo $foto['id']?>" class="like-icon"><i class="fa-solid fa-heart"></i></a>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>