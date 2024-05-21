<?php

$host = 'localhost'; 
$dbname = 'gestion_parfums'; 
$username = 'root'; 
$password = ''; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
   
    $stmt = $conn->prepare("DELETE FROM parfums WHERE id = ?");
    $stmt->bind_param("i", $id); 

 
    if ($stmt->execute()) {
        $message = "Parfum supprimé avec succès.";
    } else {
        $message = "Erreur lors de la suppression du parfum: " . $conn->error;
    }

    $stmt->close();
} else {
    $message = "Aucun parfum spécifié pour la suppression.";
}

$conn->close();

header("Location: gestion_des_parfums.php?message=" . urlencode($message));
exit();
?>