<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];

    $stmt = $conn->prepare("INSERT INTO info (nom, prenom, email, tel, adresse) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $email, $tel, $adresse]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un contact</title>
    <link rel="stylesheet" href="Css/cs.css">
</head>
<body>
    <h1>Ajouter un contact</h1>
    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required><br>
        <label>Prénom :</label>
        <input type="text" name="prenom" required><br>
        <label>Email :</label>
        <input type="email" name="email"><br>
        <label>Téléphone :</label>
        <input type="text" name="tel"><br>
        <label>Adresse :</label>
        <textarea name="adresse"></textarea><br> 
        <button type="submit" name="submit">Ajouter</button>
    </form>
</body>
</html>