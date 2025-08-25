<?php

    require_once "../config/database.php";

    // connexion à la DB
    $pdo = dbConnexion();

    // sécuriser l’ID reçu en GET
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    if ($id <= 0) {
        die("Livre introuvable.");
    }

    // requête préparée
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livre) {
        die("Livre introuvable.");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($livre['titre']); ?></title>
</head>
    <body>
        <h1><?= htmlspecialchars($livre['titre']); ?></h1>
        <p><strong>Auteur :</strong> <?= htmlspecialchars($livre['auteur']); ?></p>
        <p><strong>Année :</strong> <?= htmlspecialchars($livre['annee']); ?></p>
        <p><strong>Disponibilité :</strong> <?= $livre['disponible'] ? 'Disponible' : 'Indisponible'; ?></p>

        <a href="index.php">← Retour à la liste</a>
    </body>
</html>