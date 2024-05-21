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
$email = $conn->real_escape_string($_POST['email']);
$motdepasse = password_hash($conn->real_escape_string($_POST['motdepasse']), PASSWORD_DEFAULT);

$sql = "INSERT INTO utilisateurs (nom, email, motdepasse) VALUES ('$nom', '$email', '$motdepasse')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur ajouté avec succès!";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: gestion_utilisateurs.php");
exit();
?>