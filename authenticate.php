<?php
session_start();

$host = 'localhost';
$dbname = 'gestion_parfums';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);


$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $conn->prepare($sql);
$stmt->execute(['username' => $username, 'password' => $password]);
$user = $stmt->fetch();

if ($user) {

    $_SESSION['user_id'] = $user['id'];
    header("Location: dashboard.php"); 
} else {

    echo "<p>Incorrect identifiers.</p>";
}
?>