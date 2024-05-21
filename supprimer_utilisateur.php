<?php
$host = 'localhost';
$dbname = 'gestion_parfums';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM utilisateurs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }

    $stmt->close();
    $conn->close();
    header("Location: gestion_utilisateurs.php"); 
    exit();
} else {
    die('ID non spécifié.');
}
?>