<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Parfums</title>
    <link rel="stylesheet" href="./gestion_utilisateur.css">
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <h1>Perfume User Management</h1>
    <div class="box">
        <div class="form-box">
            <form action="ajouter_utilisateur.php" method="post">
                <input type="text" name="nom" placeholder="name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="motdepasse" placeholder="Password" required>
                <button type="submit">Add User</button>
            </form>
        </div>
        <div class="img-box">
            <img src="./image5.jpg" alt="">
        </div>
    </div>
    <div class="backgrond"></div>
    <h2>Users list</h2>
    <?php include 'afficher_utilisateurs.php'; ?>
    <?php
    include("footer.php");
    ?>
</body>
</html>