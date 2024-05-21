<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="afficher_utilisateur.css">
    <title>Afficher utilisateur</title>
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

$sql = "SELECT id, nom, email FROM utilisateurs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nom</th><th>Email</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["email"] . "</td><td><a href='modifier_utilisateur.php?id=" . $row["id"] . "'>Modifier</a> | <a href='supprimer_utilisateur.php?id=" . $row["id"] . "'>Supprimer</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé";
}

$conn->close();
?>  
</body>
</html>

