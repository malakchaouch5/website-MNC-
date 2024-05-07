<?php 
include "db.php";

// Traitement du formulaire de contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nom"];
    $email = $_POST["mail"];
    $phone = $_POST["numero_de_tel"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contact (name, mail, tel, message) VALUES (:name, :email, :phone, :message)"; // Changer "phone" en "tel"
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":message", $message);
    $stmt->execute();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US </title>
    <link rel="stylesheet" href="contact.css">
       

</head>
<body>
    <div class="navbar">
        <div class="navbar_left">MNC</div>
        <div class="navbar_right">

        <a href="project.html" > HOME</a>
        <a href="log.php">SIGN IN</a>
        <a href="catalogue.html">CATALOGUE</a>
        <a href="LUTUIF.html">LUTYIF</a>
        <a href="about.html">ABOUT</a>
        <a href="contactus.php">CONTACT</a>
        <a href="panier.html"><span class="cart">&#128722;</span><span class="cart-count">0</span></a>       </div>
    </div>
    </div>
    <br><br><br>
    <div class="ss">
    <h1>CONTACT US</h1>
    <form method="POST">
       
       
        
            <label for="nom">Name:</label><br>
            <input type="text"  name="nom" required><br>
            
            <label for="mail">E-mail:</label>
            <input type="email"  name="mail" required><br>
            <label for="numero de tel">Phone:</label><br>
            <input type="number"  name="numero de tel" required><br>
           
        
            
            <label for="message">Message or Complaint :</label><br>
            <textarea id="message" name="message" rows="5" cols="50"></textarea><br>
        
           
           <div align="right">
            <button class="env" onclick="hi()">envoyer</button>
            <input  type="reset" value="annuler">
           </div>      
    </form>


</div>
<script>
    function hi(){
        alert('Message sent successfully' );
    }
    
</script>
</body>
</html>   
