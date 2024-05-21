<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


$host = 'localhost';  
$dbname = 'gestion_stock_parfum';
$username = 'root';  
$password = '';  

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) AS count FROM parfums";
$result = $conn->query($query);
if ($result) {
    $row = $result->fetch_assoc();
    $countParfums = $row['count'];
} else {
    $countParfums = 0;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Perfume Stock Management</title>
    <link rel="stylesheet" href="Dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome !</h1>
        <p>Total number of perfumes in stock:<?php echo $countParfums; ?></p>
        <a href="logout.php"><button>Disconnect</button></a>
    </div>   
    <div class="titre_1">
        <h1>Chanel Coco Mademoiselle</h1>
    </div>
    <div class="box1">
        
        <div class="chanal_1">
            <img class="img1" src="./chanal1.webp" alt="">
            <div class="prix-1">
                <h1>100.00 (€)</h1>
                <h2>140.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="chanal_2">
            <img class="img2" src="./chanal3.jpg" alt="">
            <div class="prix-2">
                <h1>100.00 (€)</h1>
                <h2>140.00(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="chanal_3">
            <img class="img3" src="./chanal5.webp" alt="">
            <div class="prix-3">
                <h1>100.00 (€)</h1>
                <h2>140.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>   
       
    </div>
    <div class="titre_2">
        <h1>Marc Jacobs Daisy</h1>
    </div>
    <div class="box2">
        
        <div class="marc_1">
            <img class="img1" src="./marc3.jpg" alt="">
            <div class="prix-1">
                <h1>50.00 (€)</h1>
                <h2>80.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="marc_2">
            <img class="img2" src="./marc1.jpg" alt="">
            <div class="prix-2">
                <h1>50.00 (€)</h1>
                <h2>80.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="marc_3">
           <img class="img4" src="./marc2.jpg" alt="">
            <div class="prix-3">
                <h1>50.00 (€)</h1>
                <h2>80.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>   
       
    </div>
    <div class="titre_3">
        <h1>Tom Ford Velvet Orchid</h1>
    </div>
    <div class="box3">
        
        <div class="tom_1">
            <img class="img1" src="./tom4.jpg" alt="">
            <div class="prix-1">
                <h1>130.00 (€)</h1>
                <h2>150.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="tom_2">
            <img class="img2" src="./tom3.jpg" alt="">
            <div class="prix-2">
                <h1>130.00 (€)</h1>
                <h2>150.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="tom_3">
           <img class="img4" src="./tom2.jpg" alt="">
            <div class="prix-3">
                <h1>130.00 (€)</h1>
                <h2>150.00 (€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>   
       
    </div>
    <div class="titre_4">
        <h1>Yves Saint Laurent Libre</h1>
    </div>
    <div class="box4">
        
        <div class="yves_1">
            <img class="img1" src="./Yves1.jpg" alt="">
            <div class="prix-1">
                <h1>113.00	(€)</h1>
                <h2>123.00	(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="yves_2">
            <img class="img2" src="./Yves2.jpg" alt="">
            <div class="prix-2">
                <h1>113.00	(€)</h1>
                <h2>123.00	(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="yves_3">
           <img class="img4" src="./Yves4.jpg" alt="">
            <div class="prix-3">
                <h1>113.00	(€)</h1>
                <h2>123.00	(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>   
       
    </div>
    <div class="titre_5">
        <h1>Baccarat Rouge</h1>
    </div>
    <div class="box5">
        
        <div class="bacarat_1">
            <img class="img1" src="./bacarat2.jpg" alt="">
            <div class="prix-1">
                <h1>280.00	(€)</h1>
                <h2>300.00	(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="bacarat_2">
            <img class="img2" src="./bacarat4.jpg" alt="">
            <div class="prix-2">
                <h1>280.00	(€)</h1>
                <h2>300.00	(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>
        <div class="bacarat_3">
           <img class="img4" src="./bacarat1.jpg" alt="">
            <div class="prix-3">
                <h1>280.00	(€)</h1>
                <h2>300.00	(€)</h2>
            </div>
            <a href="reception.php"><button>Order Now</button></a>
        </div>   
       
    </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>