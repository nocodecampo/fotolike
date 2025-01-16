<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sube tu foto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <section>
            <h1>Sube tu foto</h1>
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