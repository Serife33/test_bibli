<?php

    require_once "../config/database.php";

    // connexion à la DB
    $pdo = dbConnexion();

    // sécuriser l’ID reçu en GET
    $id = isset($_GET['ID']) ? (int) $_GET['ID'] : 0;

    if ($id <= 0) {
        die("Livre introuvable.");
    }

    // requête préparée
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE ID = :ID");
    $stmt->execute(['ID' => $id]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livre) {
        die("Livre introuvable.");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($livre['Titre']); ?></title>
</head>
    <body>
        <h1><?= htmlspecialchars($livre['Titre']); ?></h1>
        <p><strong>Auteur :</strong> <?= htmlspecialchars($livre['Auteur']); ?></p>
        <p><strong>Année :</strong> <?= htmlspecialchars($livre['Annee']); ?></p>
        <p><strong>Disponibilité :</strong> <?= $livre['Disponible'] ? 'Disponible' : 'Indisponible'; ?></p>

        <a href="index.php">← Retour à la liste</a>
    </body>
</html>