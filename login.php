
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>login page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <div class="logreg-box">
            <div class="form-box">
                <form action="login.php" method="post" id="loginForm">
                    <h2>Sing In</h2>
                    <div class="input-box">
                        <label for="username">Username</label>
                        <i class='bx bxs-user'></i>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn">Sing In</button>
                    <div class="lorger-link">
                        <p>Don't have an account? <a onclick="toggleForms()">Sing Up</a></p>
                    </div>
                </form>

                <form action="register.php" method="post" id="registerForm" style="display:none;">
                    <h2>Sing Up</h2>
                    <div class="input-box">
                        <label for="username">Username</label>
                        <i class='bx bxs-user'></i>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <i class='bx bxl-gmail'></i>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn">Sing Up</button>
                    <div class="lorger-link">
                        <p>Already have ann account? <a onclick="toggleForms()">Sing In</a></p>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
    
    <script>
        function toggleForms() {
            var loginForm = document.getElementById('loginForm');
            var registerForm = document.getElementById('registerForm');
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            }
        }
    </script>

</body>
</html>
<?php
session_start();
$host = 'localhost';
$dbname = 'gestion_stock_parfum';
$username = 'root'; 
$password = ''; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Login failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']); 

    $sql = "SELECT * FROM utilisateurs WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: choose_page.php");
    } 
     else {
        header("Location: dashboard.php");
    }
}

$conn->close();
?>