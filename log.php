<?php 
include "db.php";

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérification des informations de connexion dans la base de données
    $stmt = $conn->prepare("SELECT * FROM inserer WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        echo "Redirection en cours...";
        header("Location: project.html");
        exit;
    } else {
        // Authentification échouée, affiche un message d'erreur
        echo '<script type="text/javascript">alert("Invalid password or username. Please enter correct login information.")</script>';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="log.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'></head>


<body>
    
    <div class="navbar">
        <div class="navbar_left">MNC</div>
        <div class="navbar_right">

            <a href="project.html" > HOME</a>
            <a href="log.html"><u>SIGN IN</u></a>
            <a href="catalogue.html">CATALOGUE</a>
            <a href="LUTUIF.html">LUTYIF</a>
            <a href="about.html">ABOUT</a>
            <a href="index.html">CONTACT</a>
            <a href="panier.html"><span class="cart">&#128722;</span><span class="cart-count">0</span></a>       </div>
       </div>
    </div>
        <div class="item">
      
     <div class="one">
        <form class="form" method ="POST">
            <h2>Log in</h2>
        
            <img src="logo.png" width="110%" >
            <br>
            <div class="ha">
            <input type="text" placeholder="Username" name="username">            <i class='bx bxs-user' ></i>
        </div>
                    
        <br>
            <div class="ha">
            <input type="password" id="password" placeholder="Password" name="password">
            <i class='bx bxs-lock-alt' ></i>
            
              </div>
            <br>
            <a href="">Forgot password?</a>
            <br>
            <br>
            <input type="submit" value="Login">
            <input  type="reset" value="reset">
            <p>Don't have an account?<a href="signupp.php">Sign up</a></p>
            
            <p id="para">login with social plateform</p>
            <div class="social1">
                <a href="https://www.facebook.com/" class="social2">
                    <i class='bx bxl-facebook-circle'></i>
                </a>
                <a href="https://myaccount.google.com/" class="social3">
                    <i class='bx bxl-google' ></i>
                </a>
            </div>
    
        </form>
</div>
<div class="two" >
    <img src="l3.png" width="100%" height="100%">     
</div>
</div>
    
</body>
</html>
