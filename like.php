<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
if (isset($_GET['idFoto'])) {
    try {
        // Conexión a la base de datos
        include 'dbconnect.php';
        // Preparamos la consulta
        $stmt = $conn->prepare("SELECT * FROM likes WHERE idFoto = :idFoto AND idUsuario = :idUsuario");
        $stmt->bindParam(':idFoto', $_GET['idFoto']);
        $stmt->bindParam(':idUsuario', $_SESSION['id']);
        $stmt->execute();
        $like = $stmt->fetch();
        // Si ya le ha dado like, lo borramos
        if ($like) {
            $stmt = $conn->prepare("DELETE FROM likes WHERE idFoto = :idFoto AND idUsuario = :idUsuario");
            $stmt->bindParam(':idFoto', $_GET['idFoto']);
            $stmt->bindParam(':idUsuario', $_SESSION['id']);
            $stmt->execute();
            header('Location: index.php');
            exit;
            // Si no le ha dado like, lo añadimos
        } else {
            $stmt = $conn->prepare("INSERT INTO likes (idFoto, idUsuario) VALUES (:idFoto, :idUsuario)");
            $stmt->bindParam(':idFoto', $_GET['idFoto']);
            $stmt->bindParam(':idUsuario', $_SESSION['id']);
            $stmt->execute();
            header('Location: index.php');
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
