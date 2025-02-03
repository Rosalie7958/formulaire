<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer le contact à modifier
    $stmt = $conn->prepare("SELECT * FROM info WHERE id = ?");
    $stmt->execute([$id]);
    $info = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['tel'];  
        $adresse = $_POST['adresse'];

        // Mettre à jour le contact dans la base de données
        $stmt = $conn->prepare("UPDATE info SET Nom = ?, prenom = ?, email = ?, tel = ?, adresse = ? WHERE id = ?");
        $stmt->execute([$nom, $prenom, $email, $telephone, $adresse, $id]);

        // Rediriger vers la page principale
        header("Location: index.php");
        exit(); // Ajout de exit pour s'assurer que le script s'arrête après la redirection
    }
    
} else {
    // Redirection si l'ID n'est pas fourni
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier un contact</title>
    <link rel="stylesheet" href="Css/cs.css">
</head>
<body>
    <h1>Modifier un contact</h1>
    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($info['Nom']) ?>" required><br>
        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($info['prenom']) ?>" required><br>
        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($info['email']) ?>"><br>
        <label>Téléphone :</label>
        <input type="text" name="tel" value="<?= htmlspecialchars($info['tel']) ?>"><br>
        <label>Adresse :</label>
        <textarea name="adresse"><?= htmlspecialchars($info['adresse']) ?></textarea><br> 
        <div class="button-container">
        <button id="buton1" class="button-style" type="submit">Modifier</button>
        <a href="index.php" class="button-style">Annuler</a>
        <!-- <button id="buton2" class="button-style" type="reset">Annuler</button> -->
    </div>
    </form>
</body>
</html>
