<?php
include "db.php";

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $interests = implode(", ", $_POST["interests"] ?? []);

    // Vérification des données du formulaire
    $errors = array();
    if (empty($fullName)) {
        $errors[] = "Le nom complet est obligatoire.";
    }
    if (empty($username)) {
        $errors[] = "Le nom d'utilisateur est obligatoire.";
    }
    if (empty($email)) {
        $errors[] = "L'adresse e-mail est obligatoire.";
    } 
    if (empty($phone)) {
        $errors[] = "Le numéro de téléphone est obligatoire.";
    }
    if (empty($password)) {
        $errors[] = "Le mot de passe est obligatoire.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if (empty($errors)) { // Si aucune erreur n'a été détectée
      // Vérification que l'email n'existe pas déjà dans la base de données
      $emailExists = false;
      $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM inserer WHERE email = :email");
      $stmt->bindParam(":email", $email);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result['count'] > 0) {
          $emailExists = true;
          $errors[] = "L'adresse e-mail existe déjà.";
      }
  
      // Vérification que le numéro de téléphone n'existe pas déjà dans la base de données
      $phoneExists = false;
      $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM inserer WHERE phone = :phone");
      $stmt->bindParam(":phone", $phone);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result['count'] > 0) {
          $phoneExists = true;
          $errors[] = "Le numéro de téléphone existe déjà.";
      }
  
      // Si les vérifications passent, alors insérer les données
      if (!$emailExists && !$phoneExists) {
          $sql = "INSERT INTO inserer (fullName, username, email, phone, password, gender, interests) VALUES (:fullName, :username, :email, :phone, :password, :gender, :interests)";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(":fullName", $fullName);
          $stmt->bindParam(":username", $username);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":phone", $phone);
          $stmt->bindParam(":password", $password);
          $stmt->bindParam(":gender", $gender);
          $stmt->bindParam(":interests", $interests);
          if ($stmt->execute()) {
            echo '<script type="text/javascript">alert("Enregistrement réussi !")</script>';
          } else {
            echo '<script type="text/javascript">alert("Erreur lors de l enregistrement!")</script>';
          }
        }
      } 
 
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signupp.css">

</head>
<body>
    
    <div class="navbar">
        <div class="navbar_left">MNC</div>
        <div class="navbar_right">

            <a href="project.html" > HOME</a>
            <a href="log.html">SIGN IN</a>
            <a href="catalogue.html"><u>CATALOGUE</u></a>
            <a href="LUTUIF.html">LUTYIF</a>
            <a href="about.html">ABOUT</a>
            <a href="contactus.html">CONTACT</a>
            <a href="panier.html"><span class="cart">&#128722;</span><span class="cart-count">0</span></a>       </div>
        </div>
    </div>
  
    </div>
    <div class="container">
    <div class="title"><strong>Registration</strong></div>
    <br>
    <div class="content">
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <label class="details">Full Name</label>
            <input type="text" name="fullname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <label class="details">Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <label class="details">Phone Number</label>
            <input type="number" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <label class="details">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <label class="details">Confirm Password</label>
            <input type="password" name="confirmPassword" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
           <h2>Gender</h2>
           <input type="radio" name="gender" value="Femme"> <span class="dot1"> <span>Female</span>
           <input type="radio" name="gender" value="Homme"> <span class="dot2">Male</span>
        </div>
        <label><h2>Interests:</h2></label>
        <label><input type="checkbox" name="interests[]" value="homme"> Men's Fashion</label>
        <label><input type="checkbox" name="interests[]" value="femme"> Women's Fashion</label>
        <label><input type="checkbox" name="interests[]" value="enfant"> Kids's Fashion</label>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) {
            echo "<div class='error-box'>";
            echo "<p>Veuillez corriger les erreurs suivantes :</p>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
            echo "</div>";
        }
        ?>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
