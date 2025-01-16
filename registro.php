<?php
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