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
    $stmt = $conn->prepare("SELECT nom, email FROM utilisateurs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if (!$user) {
        die('Utilisateur non trouvé.');
    }
} else {
    die('ID non spécifié.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nom = $_POST['nom'];
    $email = $_POST['email'];


    $updateStmt = $conn->prepare("UPDATE utilisateurs SET nom = ?, email = ? WHERE id = ?");
    $updateStmt->bind_param("ssi", $nom, $email, $id);
    $updateStmt->execute();

    if ($updateStmt->affected_rows === 1) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour.";
    }

    $updateStmt->close();
    $conn->close();
    header("Location: gestion_utilisateurs.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="./modifier_utilisateur.css">
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <h1>Edit User</h1>
    <form method="post">
        Name: <input type="text" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
        <input class="btn" type="submit" value="Update">
    </form>
</body>
</html>