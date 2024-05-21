<?php
$host = 'localhost';
$dbname = 'gestion_parfums';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nom = $conn->real_escape_string($_POST['nom']);
$description = $conn->real_escape_string($_POST['description']);
$prix = $conn->real_escape_string($_POST['prix']);

$sql = "INSERT INTO parfums (nom, description, prix) VALUES ('$nom', '$description', '$prix')";

if ($conn->query($sql) === TRUE) {
    echo "Nouveau parfum ajouté avec succès";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: gestion_des_parfums.php");
exit();
?>