<?php
require_once '../config/database.php';

// Connexion à la base
$pdo = dbConnexion();

// Vérifier qu'on a bien reçu un id en GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Supprimer la tâche
    $sql = "DELETE FROM livres WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Redirection vers l'accueil après suppression
    header("Location: index.php?msg=deleted");
    exit;
} else {
    // Si pas d'ID → retour accueil
    header("Location: index.php?msg=error");
    exit;
}