<?php
    // logique de connexion a la database
    // Information pour se connecter
    // l'endroit où est ma database
    // function qui crée et renvoi une connection à la db
function dbConnexion() {
    $host = "localhost";
        //  Le nom de la DB
    $dbname = "Bibliotheque";
        //  Identifiant de connexion
    $username = "root";
        //  password laptop : "*KLp4osj&3PC!29^$^tq%64Q7z7$2i$^"
    $password = "";
        // port
    $port= 80;
        // charset
    $charset= "utf8mb4";


    //transforme mes variable en global (accessible partout)
    // global $host, $dbname, $password, $username, $port, $charset;

    try {
        // mes param de co
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port";
        // fait mon objet de co
        $pdo = new PDO($dsn, $username, $password);
        // comment récupérer les exception (erreurs)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //comment me renvoyer les données
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;

    } catch (PDOException $e) {
        die("Erreur durant la co la db: " . $e->getMessage());
    }

}

// dbConnexion();
// var_dump($pdo);
?>