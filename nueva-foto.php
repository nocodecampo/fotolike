<?php
// inicio de sesión
session_start();
// si no hay sesión iniciada
if (!isset($_SESSION['id'])) {
    // redirigimos a la página de login
    header('Location: login.php');  
    exit;
}
// Id de sesión del usuario
$id = $_SESSION['id'];
$username = $_SESSION['nombre'];

if (isset($_POST['titulo'])) {
    // Conexión a la base de datos
    include 'dbconnect.php';

    // Guardamos la imagen en una ruta del servidor
    $imagen = $_FILES['imagen']['tmp_name'];
    $ruta = 'img/' . $_FILES['imagen']['name'];
    move_uploaded_file($imagen, $ruta);

    // Preparamos la consulta
    $stmt = $conn->prepare("INSERT INTO fotos (titulo, foto, idUsuario) VALUES (:titulo, :ruta, :usuario_id)");
    // Enlazamos los parámetros
    $stmt->bindParam(':titulo', $_POST['titulo']);
    $stmt->bindParam(':ruta', $ruta);
    $stmt->bindParam(':usuario_id', $id);
    // Ejecutamos la consulta
    $stmt->execute();
    // Redirigimos a la página
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sube tu foto</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <section>
            <h1>Sube tu foto, <?php echo $username ?></h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="titulo">Título<span>*</span></label>
                    <input type="text" name="titulo" id="titulo" placeholder="Título" required>
                </div>
                <div>
                    <label for="imagen">Imagen<span>*</span></label>
                    <input type="file" name="imagen" id="imagen" required accept="image/*">
                </div>
                <button type="submit">Subir foto</button>
            </form>
        </section>
    </main>
</body>

</html>