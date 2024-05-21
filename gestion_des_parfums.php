<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Parfums</title>
    <link rel="stylesheet" href="./Ges.css">
</head>
<body>
    <header>
    <?php
    include("navbar.php");
    ?>
        
    </header>
    <main>
        <div class="main">
            <h1>Perfume Management</h1>
        </div>
        <section>
            <h2>Add a new scent</h2>
            <form action="ajouter_parfum.php" method="post">
                <input type="text" name="nom" placeholder="Perfume name" required>
                <input type="text" name="description" placeholder="Description">
                <input type="number" name="prix" step="0.01" placeholder="Price" required>
                <button type="submit">Add</button>
            </form>
        </section>
        <section>
            <h2>List of Perfumes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'afficher-parfums.php'; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php
    include("footer.php");
    ?>
</body>
</html>