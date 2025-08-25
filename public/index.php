<?php
    require_once '../config/database.php'; // connexion à la db dans laquelle se trouve la table tasks
     $pdo = dbConnexion();

    // dans la db on accéde à toutes les données de la table tasks d
     $sql = "SELECT * FROM livres ";
     $requestDb = $pdo->prepare($sql);   
     $requestDb->execute();
     $livres = $requestDb->fetchAll(PDO::FETCH_ASSOC);

     
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Test_bibli</title>
    <link rel="stylesheet" href="../assets/styles.css">
   
</head>
<body>
    <?php
    //   include '../includes/header.php';
    ?>
    <div class="Container">
          <h2> Tous les livres </h2>
            
     <ul class="books-list">
         <!-- boucle pour afficher chaque tâches contenues dans la table livres -->
        <?php foreach ($livres as $livre) : ?> 
         
     
            <li>
                 <!-- intégration des chacune des valeurs contenues dans la table tasks pour une tâche donnée -->
                    <h3><?= htmlspecialchars($livre['Titre']) ?></h3>
                     <div>
                    <label class="" > <?= htmlspecialchars($livre['Auteur']) ?></label>
                    <label class=""> Année : <?= ($livre['Annee']) ?></label>
                    <label> Disponible : <?= ($livre['Disponibilite'] == 1 ? "Oui" : "Non") ?></label>
                    </div>
                    <div class = "">
                    <a class="" href="voir.php?id=<?= ($livre['ID']) ?>">Voir</a>
                    <a class="" href="../config/edit.php?id=<?= ($livre['ID']) ?>">Modifier</a>
                    <a class="" href="delete.php?id=<?= ($livre['ID']) ?>">Supprimer</a>
                    </div>

            </li>
         <?php endforeach; ?>
     </ul>
 </div>

  <?php
      include '../includes/footer.php';
    ?>
</body>
</html>