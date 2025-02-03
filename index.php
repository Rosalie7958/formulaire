<?php
require 'config.php';

$stmt = $conn->prepare("SELECT * FROM info ORDER BY date_creation DESC");
$stmt->execute();
$carnet = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Carnet d'adresses</title>
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>
    <h1>Liste des contacts</h1>
    <a href="ajouter.php">Ajouter un contact</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carnet as $info): ?>
                <tr>
                <td><?= htmlspecialchars($info['Nom']) ?></td>
                <td><?= htmlspecialchars($info['prenom']) ?></td>
                <td><?= htmlspecialchars($info['email']) ?></td>
                <td><?= htmlspecialchars($info['tel']) ?></td>
                <td><?= htmlspecialchars($info['adresse']) ?></td>
                
                 <td>
                        <a href="modifier_contact.php?id=<?= $info['id'] ?>">Modifier</a>
                        <a href="supprimer_contact.php?id=<?= $info['id'] ?>">Supprimer</a>
                </td>
                    </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>