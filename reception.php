<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réception de Marchandise </title>
    <link rel="stylesheet" href="./Rec.css">
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="form-container">
        <div class="main"> 
             <h1>Registration of Goods Receipts</h1>
        </div>
       <div class="box">
             <div class="img-box">
                <img src="./image9.jpg" alt="">
                <h1>P A R F U M E </h1>
            </div>
            <div class="form-box">
                <form action="reception.php" method="post">
                    <label for="produit">Product :</label>
                    <input type="text" id="produit" name="produit" required>

                    <label for="quantite">Quantity :</label>
                    <input type="number" id="quantite" name="quantite" required>

                    <label for="prix_unitaire">Unit price (€) :</label>
                    <input type="text" id="prix_unitaire" name="prix_unitaire" required pattern="^\d+(\.\d{1,2})?$">

                    <label for="date_reception">Date de Réception :</label>
                    <input type="date" id="date_reception" name="date_reception" required>

                    <button type="submit">Enregistrer la Réception</button>
                </form>
            </div>
           
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'gestion_stock_parfum'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produit = $conn->real_escape_string($_POST['produit']);
    $quantite = $conn->real_escape_string($_POST['quantite']);
    $prix_unitaire = $conn->real_escape_string($_POST['prix_unitaire']);
    $date_reception = $conn->real_escape_string($_POST['date_reception']);

    $sql = "INSERT INTO receptions (produit, quantite, prix_unitaire, date_reception) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sids", $produit, $quantite, $prix_unitaire, $date_reception);
    if ($stmt->execute()) {
        echo "Réception enregistrée avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

