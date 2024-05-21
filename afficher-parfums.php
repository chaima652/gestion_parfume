<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="afficher_utilisateur.css">
    <title> Afficher parfums</title>
</head>
<body>
    <?php
$host = 'localhost';
$dbname = 'gestion_parfums';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nom, description, prix FROM parfums";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["nom"]) . "</td><td>" . htmlspecialchars($row["description"]) . "</td><td>" . htmlspecialchars($row["prix"]) . "</td><td><a href='supprimer_parfum.php?id=" . $row["id"] . "'>Supprimer</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>Aucun parfum trouvé</td></tr>";
}
$conn->close();
?>
</body>
</html>
