<?php
if(isset($_POST['nombre'])){
    // Conexión a la base de datos
    include 'dbconnect.php';
    // Preparamos la consulta
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
    // Enlazamos los parámetros
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
    // Ejecutamos la consulta
    $stmt->execute();
    // Redirigimos a la página
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <section>
        <h1>Regístrate y a callar:</h1>
            <form action="" method="post">
                <div>
                    <label for="nombre">Nombre<span>*</span></label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                </div>
                <div>
                    <label for="email">Email<span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="password">Contraseña<span>*</span></label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Registrarse</button>
            </form>
        </section>
    </main>
</body>

</html>