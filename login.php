<?php
if(isset($_POST['email'])){
    // Conexión a la base de datos
    include 'dbconnect.php';
    // Preparamos la consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    // Enlazamos los parámetros
    $stmt->bindParam(':email', $_POST['email']);
    // Ejecutamos la consulta
    $stmt->execute();
    // Obtenemos el resultado
    $usuario = $stmt->fetch();

    // Verificamos la contraseña
    if(password_verify($_POST['password'], $usuario['password'])){
        // Iniciamos la sesión
        session_start();
        // Guardamos datos del usuario en la sesión
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['email'] = $usuario['email'];
        // Redirigimos a la página
        header('Location: index.php');
        exit;
    }
    // Si la contraseña no coincide
    $error = 'Email o contraseña incorrectos';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <section>
            <h1>¡Bienvenido!</h1>
            <form action="" method="post">
                <?php if(isset($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <div>
                    <label for="email">Email<span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="password">Contraseña<span>*</span></label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Iniciar sesión</button>
            </form>
        </section>
    </main>
</body>
</html>